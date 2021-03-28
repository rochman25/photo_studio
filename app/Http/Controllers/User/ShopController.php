<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //

    public function index(){
        return view('pages.user.shop.index');
    }

    public function show($id){
        return view('pages.user.shop.detail');
    }

    public function cart(){
        return view('pages.user.shop.cart');
    }

}
