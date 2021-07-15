<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('pages.admin.schedule.index');
    }

    public function getJsonSchedule(Request $request)
    {
        $start = explode("T",$request->input('start'));
        $end = explode("T",$request->input('end'));
        $data = [];
        $bookings = Booking::whereBetween('tanggal_booking',[$start[0], $end[0]])->get();
        // dd($bookings);
        foreach($bookings as $index => $item){
            $description = "";
            $fcEvent = "";
            if($item->status == "acc"){
                $fcEvent = "fc-event-info fc-event-solid-success";
            }else if($item->status == "pending"){
                $fcEvent = "fc-event-info fc-event-solid-warning";
            }else{
                $fcEvent = "fc-event-info fc-event-solid-danger";
            }
            $products = explode(",",$item->detail->product_id);
            foreach($products as $index_p => $item_p){
                $product = Product::find($item_p);
                $description .= " + Photo Studio - ".$product->category->nama." - ".$product->nama;
            }
            $data[] = [
                'title' => $item->detail->first_name." ".$item->detail->last_name,
                'start' => $item->tanggal_booking,
                'description' => $description,
                'className' => $fcEvent
            ];
        }
        $json = $data;

        return response()->json($json);
    }
}
