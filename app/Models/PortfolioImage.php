<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    use HasFactory;

    protected $fillable = ["portfolio_id", "file_name", "file_url", "file_path", "order"];

    public function portfolio(){
        return $this->belongsTo(Portfolio::class,'portfolio_id');
    }

}
