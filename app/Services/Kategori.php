<?php

namespace App\Services;

use App\Models\ProductCategory;

class Kategori {

    public function __construct()
    {
        
    }

    public function getList(){
        return ProductCategory::all();
    }

}