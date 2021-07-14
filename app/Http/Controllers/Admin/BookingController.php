<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $bookings = [];
        if($user->role->role->name != "super_admin"){
            $bookings = Booking::where('user_id',$user->id)->get();
        }else{
            $bookings = Booking::all();
        }
        
        return view('pages.admin.booking.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        $product_ids = explode(",",$booking->detail->product_id);
        $products = [];
        foreach($product_ids as $index => $item){
            $products[] = Product::with(['category'])->find($item)->toArray();
        }
        // dd($products);
        return view('pages.admin.booking.detail',compact('booking','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadPayment($id){
        $booking = Booking::find($id);
        return view('pages.admin.booking.upload_payment',compact('booking'));
    }

    public function postPayment(Request $request,$id){
        try {
            $request->validate([
                'file' => 'required'
            ]);
            DB::beginTransaction();
            $booking = Booking::find($id);
            $filename = str_replace(" ","_",$booking->id).".".$request->file("file")->extension();
            $path = $request->file("file")->storeAs('public/payment_confirmations',$filename);
            $url = Storage::url($path);
            $booking->bukti_transfer = $url;
            $booking->is_pay = true;
            $booking->save();
            DB::commit();
            return redirect()->route('booking.show',$id)->with('success','Bukti Pembayaran berhasil diupload');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function cancelOrder(Request $request, $id){
        try {
            DB::beginTransaction();
            $order = Booking::where('id',$id)->update([
                'status' => 'cancel'
            ]);
            DB::commit();
            $success = $order;
            return response()->json(['success'=>$success]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['success' => false,'errors' => $th->getCode()]);
        }
    }

}
