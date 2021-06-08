<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository {

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getLastestProduk(){
        return $this->product->where('status','active')->orderBy('created_at','ASC')->get();
    }

    public function getLastestProdukByKategori($slug){
        return $this->product->where('status','active')->whereHas('category',function($query)use($slug){
            $query->where('slug',$slug);
        })->orderBy('created_at','ASC')->get();
    }

    public function getActiveDetailProduct($id = null){
        return $this->product->where('id',$id)->where('status','active')->first();
    }

    public function getDetailBySlug($slug){
        $name = str_replace("-"," ",$slug);
        return $this->product->where('nama',$name)->first();
    }

}