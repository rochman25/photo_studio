@extends('layouts.app')
@section('pages')
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    {{ 'Pengaturan' }} </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{ route('kategori_produk.index') }}" class="kt-subheader__breadcrumbs-home"><i
                            class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        {{ 'Ubah Pengaturan Aplikasi' }} </a>
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
                                Form Pengaturan
                            </h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
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
                                <label>Kode</label>
                                <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror"
                                    aria-describedby="emailHelp" placeholder="Masukkan Kode Pengaturan"
                                    value="{{ old('kode', $setting->kode) }}">
                                @error('kode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Label</label>
                                <input type="text" name="label" class="form-control @error('label') is-invalid @enderror"
                                    aria-describedby="emailHelp" placeholder="Masukkan Label Pengaturan"
                                    value="{{ old('label', $setting->label) }}">
                                @error('label')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tipe</label>
                                <select name="type" class="form-control" required>
                                    <option value="">Pilih Tipe</option>
                                    <option value="text" @if ($setting->type == 'text') selected @endif>Text</option>
                                    <option value="file" @if ($setting->type == 'file') selected @endif>File</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            @if ($setting->type == 'text')
                                <div class="form-group">
                                    <label for="exampleTextarea">Value</label>
                                    <textarea name="value" class="form-control @error('value') is-invalid @enderror"
                                        id="exampleTextarea" rows="3">{{ old('value',$setting->value) }}</textarea>
                                    @error('value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @else
                                <div class="form-group form-group-last">
                                    <label for="exampleTextarea">Value</label>
                                    <input type="file" name="file" class="form-control">
                                    @error('value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
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
