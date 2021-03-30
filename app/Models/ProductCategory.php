<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    // protected $table = "kategori_produk";
    protected $fillable = ["nama","deskripsi","style","parent_id","thumbnail"];

    public function produk(){
        return $this->hasMany(Product::class,'category_id');
    }

}
