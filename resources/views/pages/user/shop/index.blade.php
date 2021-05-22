@extends('layouts.app_user')
@push('user_styles')
    <style>
        [data-toggle="collapse"] .fa:before {
            content: "\f139";
        }

        [data-toggle="collapse"].collapsed .fa:before {
            content: "\f13a";
        }

    </style>
@endpush
@section('user_pages')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Shop</h2>
                    <ol>
                        <li><a href="{{ route('view.user.home') }}">Home</a></li>
                        <li>Shop</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page pt-4">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-4 mb-3">
                        <div class="card" style="">
                            <div class="card-header">
                                <h4>Categories</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                @forelse ($categories as $item)
                                    <li class="list-group-item"><a
                                            href="{{ route('view.user.shop.categories', $item->slug) }}">{{ $item->nama }}</a>
                                    </li>
                                @empty
                                    <li class="list-group-item">{{ 'Kategori Belum Ada' }}</li>
                                @endforelse
                                {{-- <li id="headingOne" class="list-group-item">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseExample"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        Categori 1<i style="float: right" class="fa" aria-hidden="true"></i>
                                    </a>
                                    <div class="collapse" id="collapseExample">
                                        <p style="font-size: 13px; margin:2px"><a style="margin-left:10px" href=""><i
                                                    class="fa fa-chevron-right"></i> Sub Categori 1</a></p>
                                    </div>
                                </li>
                                <li class="list-group-item">Vestibulum at eros</li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card" style="">
                            <div class="card-header">
                                <h4>Products</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            @forelse ($products as $item)
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm">
                                        <img class="card-img-top" src="{{ asset($item->thumbnail) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <h4 style="font-weight: bold">
                                                    {{ $item->nama }}
                                                </h4>
                                                @currency($item->harga)
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('view.user.shop.detail', 'Produk-1') }}" type="button"
                                                        class="btn btn-sm btn-outline-secondary">Pesan</a>
                                                </div>
                                                {{-- <small class="text-muted">9 mins</small> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12">
                                    <div class="card mb-4 shadow-sm">
                                        <div class="card-body">
                                            <p class="card-text">{{ 'Oops Produk belum ditambahkan' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                            {{--  --}}
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
            {{-- </div> --}}
        </section>

    </main><!-- End #main -->
@endsection
