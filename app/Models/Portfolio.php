<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ["nama", "caption", "file_name", "file_path", "file_url", "order"];

    public function images(){
        return $this->hasMany(PortfolioImage::class,'portfolio_id');
    }

}
