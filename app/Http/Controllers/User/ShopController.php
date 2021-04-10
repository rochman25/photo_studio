<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Kategori;
use App\Services\Produk;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //

    public function index($slug = null){
        $serviceProduk = new Produk();
        $serviceKategori = new Kategori();
        if($slug !== null){
            $products = $serviceProduk->getLastestProdukByKategori($slug);
        }else{
            $products = $serviceProduk->getLastestProduk();
        }
        $categories = $serviceKategori->getList();
        return view('pages.user.shop.index',compact('products','categories'));
    }

    public function show($id){
        $serviceProduk = new Produk();
        $product = $serviceProduk->getActiveDetailProduct($id);
        return view('pages.user.shop.detail',compact('product'));
    }

    public function cart(){
        return view('pages.user.shop.cart');
    }

}
