@extends('layouts.app_user')
@section('user_pages')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Produk</h2>
                    <ol>
                        <li><a href="{{ route('view.user.shop') }}">Shop</a></li>
                        <li>{{ $product->nama }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="portfolio-details">
            <div class="container">

                <div class="portfolio-details-container">

                    <div class="owl-carousel portfolio-details-carousel">
                        <img src="{{ asset($product->thumbnail) }}" class="img-fluid" alt="">
                        {{-- <img src="{{ asset('user_assets/img/portfolio/portfolio-details-1.jpg') }}" class="img-fluid" alt=""> --}}
                    </div>

                    <div class="portfolio-info">
                        <h3>Informasi Produk</h3>
                        <ul>
                            <li><strong>Kategori</strong>: {{ $product->category->nama }}</li>
                            <li><strong>Harga</strong>: Rp. {{ number_format($product->harga) }}</li>
                        </ul>
                        <a href="{{ route('get.add_to_cart',$product->id) }}" class="btn btn-secondary btn-md" style="width: 100%">PESAN</a>
                    </div>

                </div>

                <div class="portfolio-description">
                    <h2>{{ $product->nama }}</h2>
                    <p>
                        {!! $product->deskripsi !!}
                    </p>

                </div>
            </div>
        </section><!-- End Portfolio Details Section -->
    </main>
@endsection
