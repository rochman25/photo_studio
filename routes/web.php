<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\ShopController;
use Illuminate\Support\Facades\Auth;
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
    Route::get('/register',[AuthController::class,'registerView'])->name('register');
    Route::post('/register/user',[AuthController::class,'registerNewUser'])->name('post.register');

    Route::get('/', [UserHomeController::class, 'index'])->name('view.user.home');
    Route::get('/shop',[ShopController::class,'index'])->name('view.user.shop');
    Route::get('/shop/{slug}',[ShopController::class,'index'])->name('view.user.shop.categories');
    Route::get('/shop/detail/{slug}',[ShopController::class,'show'])->name('view.user.shop.detail');
    Route::get('/portfolio',[UserHomeController::class,'portfolio'])->name('view.user.portfolio');
    Route::get('/portfolio/{id}',[UserHomeController::class,'detail_portfolio'])->name('view.user.portfolio.detail');
    Route::get('/about_us',[UserHomeController::class,'about'])->name('view.user.about_us');
    Route::get('/contact_us',[UserHomeController::class,'contact'])->name('view.user.contact_us');
    Route::get('/cart',[ShopController::class,'cart'])->name('view.user.cart');
});

Route::middleware(['auth'])->group(function () {
    Route::get('admin/home', [HomeController::class, 'index'])->name('view.home');

    //resource route
    //produk
    Route::resource('admin/produk', ProdukController::class);

    //kategori produk
    Route::resource('admin/kategori_produk', KategoriProdukController::class);

    //user
    Route::post('admin/user/{id}/reset_password',[UserController::class,'resetPassword'])->name('user.reset_password');
    Route::resource('admin/user', UserController::class);
    
    //role
    Route::resource('admin/role', RoleController::class);
    
    //booking
    Route::resource('admin/booking', BookingController::class);

    //heros
    Route::resource('admin/hero',HeroController::class);

    //portfolio
    // Route::resource('/admin/portfolio', [PortfolioController::class]);
    
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});
