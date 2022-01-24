@extends('layouts.app_user')
@section('user_pages')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Checkout</h2>
                    <ol>
                        <li><a href="{{ route('view.user.home') }}">Home</a></li>
                        <li>Shop</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="portfolio-details">
            <div class="px-4 px-lg-0">
                <!-- For demo purpose -->
                <div class="container text-black py-5 text-center">
                    <h1 class="display-4">Checkout Pesanan</h1>
                    </p>
                </div>
                <!-- End -->
                <div class="container">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-text">{{ $message }}</div>
                            <div class="alert-close">
                                <i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i>
                            </div>
                        </div>
                    @endif
                </div>
                <form action="{{ route('post.checkout') }}" method="POST">
                    @csrf
                    <div class="pb-5">
                        <div class="container">
                            <div class="row p-5 bg-white rounded shadow-sm mb-5">
                                <div class="col-lg-6">
                                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Booking
                                        Detail
                                    </div>
                                    <div class="p-2" style="padding-bottom: 1px">
                                        <input type="date" name="tanggal_booking" class="form-control"
                                            placeholder="Tanggal *" value="{{ old('tanggal_booking') }}" required>
                                    </div>
                                    <div class="p-2" style="padding-bottom: 1px">
                                        <input type="time" name="waktu_booking" class="form-control" placeholder="Waktu *"
                                            value="{{ old('waktu_booking') }}" required>
                                    </div>
                                    <div class="p-2" style="padding-bottom: 1px">
                                        <input type="text" name="first_name" class="form-control"
                                            placeholder="Nama Depan *" value="{{ old('last_name') }}" required>
                                    </div>
                                    <div class="p-2">
                                        <input type="text" name="last_name" class="form-control"
                                            placeholder="Nama Belakang *" value="{{ old('last_name') }}" required>
                                    </div>
                                    <div class="p-2">
                                        <input type="number" name="phone" class="form-control" placeholder="Phone *"
                                            value="{{ old('phone') }}" required>
                                    </div>
                                    <div class="p-2">
                                        <input type="email" name="email" class="form-control" placeholder="Email *"
                                            value="{{ old('email', Auth::user()->email) }}" required>
                                    </div>
                                    <div class="p-2">
                                        <textarea name="address" cols="30" rows="2" class="form-control"
                                            placeholder="Alamat Lengkap Anda *" required>{{ old('address') }}</textarea>
                                    </div>

                                </div>
                                <div class="col-lg-6">

                                    <!-- Shopping cart table -->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="rounded-pill border-0 bg-light">
                                                        <div class="p-2 px-3 text-uppercase">Produk</div>
                                                    </th>
                                                    <th scope="col" class="rounded-pill border-0 bg-light">
                                                        <div class="py-2 text-uppercase">Harga</div>
                                                    </th>
                                                    <th scope="col" class="rounded-pill border-0 bg-light">
                                                        <div class="py-2 text-uppercase">Hapus</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($total = 0)
                                                @foreach ($carts as $index => $item)
                                                    <tr>
                                                        <th scope="row" class="border-0">
                                                            <div class="p-2">
                                                                <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg"
                                                                    alt="" width="70" class="img-fluid rounded shadow-sm">
                                                                <div class="ml-3 d-inline-block align-middle">
                                                                    <h5 class="mb-0"> <a
                                                                            href="{{ route('view.user.shop.detail', str_replace(' ', '-', $item['name'])) }}"
                                                                            target="__blank"
                                                                            class="text-dark d-inline-block align-middle">{{ $item['name'] }}</a>
                                                                    </h5><span
                                                                        class="text-muted font-weight-normal font-italic d-block">Category:
                                                                        {{ $item['category'] }}</span>
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <td class="border-0 align-middle"><strong>Rp.
                                                                {{ number_format($item['price'], 0, '.', '.') }}</strong>
                                                        </td>
                                                        <td class="border-0 align-middle"><a
                                                                href="{{ route('get.remove_from_cart', $index) }}"
                                                                class="text-dark"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    @php($total += $item['price'])
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End -->
                                </div>
                            </div>

                            <div class="row p-4 bg-white rounded shadow-sm">
                                <div class="col-lg-6">
                                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Catatan
                                        tambahan</div>
                                    <div class="p-4">
                                        <p class="font-italic mb-4">Jika Anda memiliki beberapa informasi untuk kami, Anda
                                            dapat
                                            meninggalkannya di kotak di bawah ini</p>
                                        <textarea name="catatan" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Rangkuman
                                        Pesanan </div>
                                    <div class="p-4">
                                        <ul class="list-unstyled mb-4">
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Total</strong>
                                                <h5 class="font-weight-bold">Rp. {{ number_format($total, 0, '.', '.') }}
                                                </h5>
                                            </li>
                                        </ul>
                                        <button type="submit"
                                            class="btn btn-dark rounded-pill py-2 btn-block">Checkout</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </section>

    </main>
@endsection
