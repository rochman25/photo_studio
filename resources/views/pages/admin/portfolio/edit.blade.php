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
                    {{ 'Portfolio' }} </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        {{ 'Tambah Portfolio' }} </a>
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
                                Portfolio
                            </h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('portfolio.update',$portfolio->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <label>Nama Portfolio</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                    aria-describedby="emailHelp" placeholder="Masukkan Nama Portfolio"
                                    value="{{ old('nama',$portfolio->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Caption Portfolio</label>
                                <textarea name="caption" class="form-control @error('caption') is-invalid @enderror"
                                    aria-describedby="emailHelp" placeholder="Masukkan Caption Portfolio"
                                    >{{ old('caption',$portfolio->caption) }}</textarea>
                                @error('caption')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Urutan Portfolio</label>
                                <input type="number" name="order" class="form-control @error('order') is-invalid @enderror"
                                    aria-describedby="emailHelp" placeholder="Masukkan urutan Portfolio"
                                    value="{{ old('order',$portfolio->order) }}">
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row" style="margin-top:10px">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Portfolio</label>
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
