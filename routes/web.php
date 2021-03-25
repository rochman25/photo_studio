<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function () {
    //
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('post.login');
    Route::get('/', [UserHomeController::class, 'index'])->name('view.user.home');
    Route::get('/shop',[ShopController::class,'index'])->name('view.user.shop');
    Route::get('/shop/{id}',[ShopController::class,'show'])->name('view.user.shop.detail');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('view.home');

    //resource route
    //produk
    Route::resource('produk', ProdukController::class);

    //kategori produk
    Route::resource('kategori_produk', KategoriProdukController::class);

    //user
    Route::resource('user', UserController::class);
    
    //role
    Route::resource('role', RoleController::class);
    
    //booking
    Route::resource('booking', BookingController::class);
    
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});
