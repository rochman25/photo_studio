<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Product;
use App\Services\Kategori;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    //
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index($slug = null)
    {
        $serviceKategori = new Kategori();
        $products = [];
        if ($slug !== null) {
            $products = $this->productRepository->getLastestProdukByKategori($slug);
        } else {
            $products = $this->productRepository->getLastestProduk();
        }
        $categories = $serviceKategori->getList();
        return view('pages.user.shop.index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = $this->productRepository->getDetailBySlug($id);
        return view('pages.user.shop.detail', compact('product'));
    }

    public function cart(Request $request)
    {
        $carts = session()->get('cart');
        return view('pages.user.shop.cart', compact('carts'));
    }

    public function addToCart(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            if (!$product) {
                abort(404);
            }
            $cart = session()->get('cart');
            if (!$cart) {
                $cart = [
                    $id => [
                        "name" => $product->nama,
                        "price" => $product->harga,
                        "category" => $product->category->nama
                    ]
                ];
                session()->put('cart', $cart);
                return redirect()->route('view.user.cart')->with('success', 'Product added to cart successfully!');
            }
            $cart[$id] = [
                "name" => $product->nama,
                "price" => $product->harga,
                "category" => $product->category->nama
            ];
            session()->put('cart', $cart);
            return redirect()->route('view.user.cart')->with('success', 'Product added to cart successfully!');
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function removeCart($id)
    {        
        $cart = Session::get('cart');
        unset($cart[$id]);
        Session::put('cart', $cart);
        return redirect()->route('view.user.cart')->with('success', 'Product remove from cart successfully!');
    }

    public function checkout(Request $request)
    {
        try {
            $request->validate([
                'tanggal_booking'   => 'required|date',
                'waktu_booking'     => 'required',
                'first_name'        => 'required',
                'last_name'         => 'required',
                'phone'             => 'required|numeric',
                'email'             => 'required|email'
            ]);
            DB::beginTransaction();
            $cart = session()->get('cart');
            $total = 0;
            $products = [];
            foreach($cart as $index => $item){
                $products[] = $index;
                $total += $item['price'];
            }
            $bookingData = $request->only(['tanggal_booking','waktu_booking','catatan']);
            $bookingData['status'] = 'pending';
            $bookingData['is_pay'] = FALSE;
            $bookingData['user_id'] = Auth::user()->id;
            $bookingData['total'] = $total;
            $booking = Booking::create($bookingData);

            $bookingDetailData = $request->only(['first_name','last_name','address','phone','email']);
            $bookingDetailData['booking_id'] = $booking->id;
            $bookingDetailData['product_id'] = implode(",",$products);
            BookingDetail::create($bookingDetailData);
            DB::commit();
            return redirect()->route('booking.index')->with('success','Booking berhasil disimpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }
}
