<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Kategori;
use App\Services\Produk;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //

    public function index(){
        $serviceProduk = new Produk();
        $serviceKategori = new Kategori();
        $products = $serviceProduk->getLastestProduk();
        $categories = $serviceKategori->getList();
        return view('pages.user.shop.index',compact('products','categories'));
    }

    public function show($id){
        return view('pages.user.shop.detail');
    }

    public function cart(){
        return view('pages.user.shop.cart');
    }

}
