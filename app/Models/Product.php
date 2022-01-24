<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ["category_id","nama","deskripsi","harga","diskon","diskon_type","thumbnail","status"];

    public function category(){
        return $this->belongsTo(ProductCategory::class,'category_id');
    }

}
