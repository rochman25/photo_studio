<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Services\Kategori;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_produk = ProductCategory::all();
        return view('pages.admin.kategori_produk.index',compact('kategori_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kategori_produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:product_categories,nama'
        ]);
        try{
            DB::beginTransaction();
            $kategori_produk = new Kategori();
            $kategori_produk->create($request->all());
            // ProductCategory::create($request->all());
            DB::commit();
            return redirect()->route('kategori_produk.index')->with('success','Data Berhasil disimpan');
        }catch(Exception $e){
            DB::rollBack();
            dd($e);
            return redirect()->back()->withErrors(['Error Code'=>$e->getCode()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori_produk = ProductCategory::find($id);
        return view('pages.admin.kategori_produk.edit',compact('kategori_produk'));
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
        // dd($request);
        $request->validate([
            "nama" => "required|unique:product_categories,nama,".$id
        ]);

        try {
            //code...
            DB::beginTransaction();
            $kategori_produk = ProductCategory::find($id);
            $kategori_produk->nama = $request->nama;
            $kategori_produk->deskripsi = $request->deskripsi;
            $kategori_produk->save();
            DB::commit();
            return redirect()->route('kategori_produk.index')->with('success','Data Berhasil disimpan');
        } catch (Exception $e) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->withErrors(['error code:'=>$e->getCode()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            ProductCategory::where('id',$id)->delete();
            DB::commit();
            $success = true;         
            return response()->json(['success'=>$success]);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['success' => false,'errors' => $e->getCode()]);
        }
    }
}
