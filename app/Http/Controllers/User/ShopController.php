<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Kategori;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index($slug = null){
        $serviceKategori = new Kategori();
        if($slug !== null){
            $products = $this->productRepository->getLastestProdukByKategori($slug);
        }else{
            $products = $this->productRepository->getLastestProduk();
        }
        $categories = $serviceKategori->getList();
        return view('pages.user.shop.index',compact('products','categories'));
    }

    public function show($id){
        $product = $this->productRepository->getDetailBySlug($id);
        return view('pages.user.shop.detail',compact('product'));
    }

    public function cart(){
        return view('pages.user.shop.cart');
    }

}
