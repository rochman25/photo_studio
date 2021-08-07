@extends('layouts.app')
@section('pages')
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    {{ 'Kategori Produk' }} </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{ route('kategori_produk.index') }}" class="kt-subheader__breadcrumbs-home"><i
                            class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        {{ 'Ubah Kategori Produk' }} </a>
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
                                Data Kategori Produk
                            </h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('kategori_produk.update',$kategori_produk->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="kt-portlet__body">
                            <div class="form-group form-group-last">
                                @if ($errors->any())
                                    <div class="alert alert-warning" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                                        <div class="alert-text">
                                            {{ 'Simpan Data Gagal' }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nama Kategori Produk</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                    aria-describedby="emailHelp" placeholder="Masukkan nama kategori produk" value="{{ old('nama', $kategori_produk->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- <div class="form-group form-group-last">
                            //     <label for="exampleTextarea">Deskripsi Kategori Produk</label>
                            //     <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="exampleTextarea"
                            //         rows="3">{{ old('deskripsi',$kategori_produk->deskripsi) }}</textarea>
                            //     @error('deskripsi')
                            //         <div class="invalid-feedback">{{ $message }}</div>
                            //     @enderror
                            // </div> -->
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
