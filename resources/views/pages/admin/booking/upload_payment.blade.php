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
                    {{ 'Orders' }} </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{ route('booking.show', $booking->id) }}" class="kt-subheader__breadcrumbs-home"><i
                            class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        {{ 'Upload Bukti Pembayaran' }} </a>
                    <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="margin-top:0px">
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Pembayaran
                            </h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('booking.upload_payment.post', $booking->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="kt-invoice__footer">
                                            <div class="kt-invoice__container">
                                                <div class="kt-invoice__bank">
                                                    <div class="kt-invoice__title"><h4>BANK TRANSFER</h4></div>
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
                                <div class="row" style="margin-top:10px">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Bukti Pembayaran</label>
                                        <input type="file" name="file"
                                            class="form-control @error('file') is-invalid @enderror"
                                            value="{{ old('file') }}">
                                        @error('file')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
@endsection
