@extends('layouts.app')
@push('styles')
    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ asset('admin_asset/assets/css/pages/invoices/invoice-1.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('pages')
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    {{ 'Order Booking' }} </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
            </div>
            <div class="kt-subheader__toolbar">
                <div class="kt-subheader__wrapper">
                    <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Tambah Data"
                        data-placement="left">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Invoice 1 </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">
                            Pages </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">
                            Invoice 1 </a>
                        <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet">
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="kt-invoice-1">
                        <div class="kt-invoice__head" style="background-image: url(assets/media/bg/bg-6.jpg);">
                            <div class="kt-invoice__container">
                                <div class="kt-invoice__brand">
                                    <h1 class="kt-invoice__title">Order Detail</h1>
                                    <div href="#" class="kt-invoice__logo">
                                        <a href="#"><img src="{{ asset('user_assets/img/logo.png') }}" width="150px"></a>
                                        <span class="kt-invoice__desc">
                                            <span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
                                            <span>Mississippi 96522</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-invoice__items">
                                    <div class="kt-invoice__item">
                                        <span class="kt-invoice__subtitle">Detail Order</span>
                                        <span class="kt-invoice__text"><b>Waktu Booking : <br />{!! 'Tanggal: ' . \Carbon\Carbon::parse($booking->tanggal_booking)->format('d-m-Y') . '<br/> Pukul : ' . $booking->waktu_booking !!}</b></span>
                                    </div>
                                    <div class="kt-invoice__item" style="text-align: center">
                                        <span class="kt-invoice__subtitle">Atas Nama</span>
                                        <span
                                            class="kt-invoice__text"><b>{{ $booking->detail->first_name . ' ' . $booking->detail->last_name }}</b></span>
                                        <span class="kt-invoice__text"><b>{{ $booking->detail->phone }}</b></span>
                                        <span class="kt-invoice__text"><b>{{ $booking->detail->email }}</b></span>
                                        <span class="kt-invoice__text"><b>{{ $booking->detail->address }}</b></span>
                                    </div>
                                    <div class="kt-invoice__item" style="text-align: right">
                                        <span class="kt-invoice__subtitle">Status Pembayaran</span>
                                        <span clss="kt-invoice__text">
                                            @if ($booking->is_pay)
                                                <h3 class="kt-invoice__price">Sudah Dibayar</h3>
                                                <img src="{{ asset($booking->bukti_transfer) }}" width="200px" height="300px" style="margin-top: 10px" alt="bukti pembayaran">
                                            @else
                                                <h3 class="kt-invoice__price">Belum Dibayar</h3>
                                                @if($booking->status != "cancel")
                                                    <a href="{{ route('booking.upload_payment',$booking->id) }}" class="btn btn-info btn-sm">Upload Bukti Pembayaran</a>
                                                @endif
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-invoice__body">
                            <div class="kt-invoice__container">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Produk</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $item)
                                                <tr>
                                                    <td>{!! $item['nama'] . '<br/> Kategori: ' . $item['category']['nama'] !!}</td>
                                                    <td>Rp {{ number_format($item['harga'], 0, '.', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="kt-invoice__footer">
                            <div class="kt-invoice__container">
                                <div class="kt-invoice__bank">
                                    <div class="kt-invoice__title">BANK TRANSFER</div>
                                    <div class="kt-invoice__item">
                                        <span class="kt-invoice__label">Account Name:</span>
                                        <span class="kt-invoice__value">Barclays UK</span></span>
                                    </div>
                                    <div class="kt-invoice__item">
                                        <span class="kt-invoice__label">Account Number:</span>
                                        <span class="kt-invoice__value">1234567890934</span></span>
                                    </div>
                                    <div class="kt-invoice__item">
                                        <span class="kt-invoice__label">Code:</span>
                                        <span class="kt-invoice__value">BARC0032UK</span></span>
                                    </div>
                                </div>
                                <div class="kt-invoice__total">
                                    <span class="kt-invoice__title">TOTAL</span>
                                    <span class="kt-invoice__price">Rp.
                                        {{ number_format($booking->total, 0, '.', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>
@endsection
