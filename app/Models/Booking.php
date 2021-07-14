<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','tanggal_booking','waktu_booking','catatan','status','is_pay','bukti_transfer','total'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function detail(){
        return $this->hasOne(BookingDetail::class,'booking_id');
    }


}
