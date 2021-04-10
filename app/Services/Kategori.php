<?php

namespace App\Services;

use App\Models\ProductCategory;
use Illuminate\Support\Str;
class Kategori {

    public function __construct()
    {
        
    }

    public function create(array $attributes){
        $kategori = new ProductCategory();
        $kategori->nama = $attributes['nama'] ?? null;
        $kategori->style = $attributes['style'] ?? "single";
        $kategori->parent_id = $attributes['parent_id'] ?? null;
        $kategori->deskripsi = $attributes['deskripsi'] ?? null;
        $kategori->thumbnail = $attributes['thumbnail'] ?? null;
        $kategori->slug = Str::slug($attributes['nama'] ?? null);
        $kategori->save();
        return $kategori;
        // return ProductCategory::create($attributes);
    }

    public function getList(){
        return ProductCategory::all();
    }

}