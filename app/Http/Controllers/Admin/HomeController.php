<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        if($user->role->role->name != "super_admin"){
            $cancel_order = Booking::where('status','cancel')->where('user_id',$user->id)->count();
            $pending_order = Booking::where('status','pending')->where('user_id',$user->id)->count(); 
            $accept_order = Booking::where('status','acc')->where('user_id',$user->id)->count();
            return view('pages.admin.dashboard-user',compact('cancel_order','pending_order','accept_order'));   
        }
        $cancel_order = Booking::where('status','cancel')->count();
        $pending_order = Booking::where('status','pending')->count(); 
        $accept_order = Booking::where('status','acc')->count();
        $best_sellers = [];
        $new_users = User::orderBY('id','desc')->take(10)->get();
        $new_orders = Booking::orderBy('id','desc')->take(10)->get();
        return view('pages.admin.dashboard',compact('cancel_order','pending_order','accept_order','new_orders','new_users','best_sellers'));
    }
}
