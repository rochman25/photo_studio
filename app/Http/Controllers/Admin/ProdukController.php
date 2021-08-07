<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Product::all();
        return view('pages.admin.produk.index',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_produk = ProductCategory::all();
        return view('pages.admin.produk.create',compact('kategori_produk'));
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
            "category_id" => "required",
            "nama" => "required",
            "deskripsi" => "required",
            "harga" => "required",
            "thumbnail" => "required"
        ]);

        try{
            DB::beginTransaction();
            // dd($request);
            $filename = str_replace(" ","_",$request->nama).".".$request->file("thumbnail")->extension();
            $path = $request->file("thumbnail")->storeAs('public/thumbnails',$filename);
            $url = Storage::url($path);
            // dd($url);
            Product::create([
                "nama" => $request->nama,
                "deskripsi" => $request->deskripsi,
                "category_id" => $request->category_id,
                "harga" => $request->harga,
                "thumbnail" => $url,
                "diskon" => $request->diskon,
                "status" => "active",
            ]);
            // dd($path);
            DB::commit();
            return redirect()->route('produk.index')->with('success','Data berhasil disimpan');
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
        $produk = Product::find($id);
        $kategori_produk = ProductCategory::all();
        return view('pages.admin.produk.edit',compact('produk','kategori_produk'));
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
        $request->validate([
            "nama" => "required|unique:products,nama,".$id,
            "deskripsi" => "required",
            "harga" => "required|numeric",
            "diskon" => "numeric",
        ]);
        try{
            DB::beginTransaction();
            $produk = Product::where('id',$id)->first();
            $url = $produk->thumbnail;
            $file = explode("/",$produk->thumbnail);

            if($request->thumbnail){
                Storage::delete('public/thumbnails/'.$file[array_key_last($file)]);
                $filename = str_replace(" ","_",$request->nama).".".$request->file("thumbnail")->extension();
                $path = $request->file("thumbnail")->storeAs('thumbnails',$filename);
                $url = Storage::url($path);
            }

            if($request->nama != $produk->nama){
                $file_ = explode(".",$file[array_key_last($file)]);
                Storage::move('thumbnails/'.$file[array_key_last($file)], 'thumbnails/'.str_replace(" ","_",$request->nama).".".$file_[1]);
                $url = Storage::url('thumbnails/'.str_replace(" ","_",$request->nama).".".$file_[1]);
            }

            Product::where('id',$id)->update([
                "nama" => $request->nama,
                "deskripsi" => $request->deskripsi,
                "category_id" => $request->category_id,
                "harga" => $request->harga,
                "diskon" => $request->diskon,
                "thumbnail" => $url,
                "status" => "active",
            ]);
            DB::commit();
            return redirect()->route('produk.index')->with('success',"Data berhasil diperbarui");
        }catch(Exception $e){
            // dd($e);
            DB::rollBack();
            return redirect()->back()->withErrors(["Error Code"=>$e->getCode()]);
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
            $produk = Product::where('id',$id)->first();
            $file = explode("/",$produk->thumbnail);
            Storage::delete('public/thumbnails/'.$file[array_key_last($file)]);
            $produk->delete();
            DB::commit();
            $success = true;         
            return response()->json(['success'=>$success]);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['success' => false,'errors' => $e->getMessage()]);
        }
    }
}
