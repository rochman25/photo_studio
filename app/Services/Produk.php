<?php

namespace App\Services;

use App\Models\Product;

class Produk {

    public function __construct()
    {
        
    }

    public function getLastestProduk(){
        return Product::where('status','active')->orderBy('created_at','ASC')->get();
    }

    public function getLastestProdukByKategori($slug){
        return Product::where('status','active')->whereHas('category',function($query)use($slug){
            $query->where('slug',$slug);
        })->orderBy('created_at','ASC')->get();
    }

    public function getActiveDetailProduct($id = null){
        return Product::where('id',$id)->where('status','active')->first();
    }

}