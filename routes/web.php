<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScheduleController;
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

// Route::middleware(['guest'])->group(function () {
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
// });

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::middleware(['auth','cors'])->group(function () {
    Route::get('/cart',[ShopController::class,'cart'])->name('view.user.cart');
    Route::get('/cart/{id}/remove',[ShopController::class,'removeCart'])->name('get.remove_from_cart');
    Route::get('/cart/{id}/add',[ShopController::class,'addToCart'])->name('get.add_to_cart');
    Route::post('/checkout',[ShopController::class,'checkout'])->name('post.checkout');
    Route::get('admin/home', [HomeController::class, 'index'])->name('view.home');

    //resource route
    //produk
    Route::resource('admin/produk', ProdukController::class);
    Route::post('admin/produk/{id}',[ProdukController::class,'destroy'])->name('produk.destroy');

    //kategori produk
    Route::resource('admin/kategori_produk', KategoriProdukController::class);
    Route::post('admin/kategori_produk/{id}', [KategoriProdukController::class,'destroy'])->name('kategori_produk.destroy');

    //user
    Route::post('admin/user/{id}/reset_password',[UserController::class,'resetPassword'])->name('user.reset_password');
    Route::resource('admin/user', UserController::class);
    Route::post('admin/user/{id}', [UserController::class,'destroy'])->name('user.destroy');
    
    //role
    Route::resource('admin/role', RoleController::class);
    
    //booking
    Route::get('admin/booking/{id}/upload_payment',[BookingController::class,'uploadPayment'])->name('booking.upload_payment');
    Route::post('admin/booking/{id}/upload_payment',[BookingController::class, 'postPayment'])->name('booking.upload_payment.post');
    Route::post('admin/booking/{id}/cancel', [BookingController::class, 'cancelOrder'])->name('booking.order.cancel');
    Route::post('admin/booking/{id}/accept',[BookingController::class, 'acceptOrder'])->name('booking.order.accept');
    Route::resource('admin/booking', BookingController::class);

    //heros
    Route::resource('admin/hero',HeroController::class);
    Route::post('admin/hero/{id}',[HeroController::class,'destroy'])->name('hero.destroy');

    //portfolio
    Route::resource('/admin/portfolio', PortfolioController::class);
    Route::post('admin/portfolio/{id}',[PortfolioController::class,'destroy'])->name('portfolio.destroy');
    
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

    Route::get('schedules',[ScheduleController::class,'index'])->name('schedule.index');
    Route::get('schedules/json',[ScheduleController::class,'getJsonSchedule'])->name('schedules.json');
    Route::resource('admin/setting',SettingController::class);

    Route::resource('teams',TeamController::class);
});
