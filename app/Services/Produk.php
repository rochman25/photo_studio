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

}