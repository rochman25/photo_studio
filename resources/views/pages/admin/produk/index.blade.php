@extends('layouts.app')
@section('pages')
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    {{ 'Produk' }} </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
            </div>
            <div class="kt-subheader__toolbar">
                <div class="kt-subheader__wrapper">
                    <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Tambah Data"
                        data-placement="left">
                        <a href="{{ route('produk.create') }}" class="btn btn-icon" aria-haspopup="true"
                            aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1"
                                class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
                                        fill="#000000" />
                                </g>
                            </svg>

                            <!--<i class="flaticon2-plus"></i>-->
                        </a>
                    </div>
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
                                {{ 'Data Produk' }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <!--begin::Section-->
                        <div class="kt-section">
                            <div class="kt-section__content">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success" role="alert">
                                        <div class="alert-icon"><i class="flaticon-like"></i></div>
                                        <div class="alert-text">
                                            {{ $message }}
                                        </div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="la la-close"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Thumbnail</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Terakhir diupadte</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($produk as $index => $item)
                                            <tr>
                                                <td>{{ ++$index }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td><img src="{{ asset($item->thumbnail) }}" width="100px" loading="lazy"></td>
                                                <td>{{ $item->category->nama }}</td>
                                                <td>{{ $item->harga }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('produk.edit',$item->id) }}" class="btn btn-sm btn-success"><i class="flaticon-edit"></i></a>
                                                    <button type="button"
                                                        data-url="{{ route('produk.destroy', $item->id,['param'=>'delete']) }}"
                                                        class="btn btn-sm btn-danger btn-hapus"><i class="flaticon2-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <th scope="row" colspan="7" class="text-center">-- Belum ada data-- </th>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--end::Section-->
                    </div>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-hapus').click(function() {
                // alert("Hapus fired.")
                const url = $(this).data('url');
                const idBtn = $(this).data('id');
                swal.fire({
                    title: "Konfirmasi",
                    text: "Apakah anda yakin ingin menghapus ?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                    reverseButtons: true,
                }).then(function(result){
                    if (result.value) {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: idBtn
                            },
                            success: function(response) {
                                console.log(response)
                                if (response.success) {
                                    swal.fire("Sukses!", "Data berhasil dihapus", "success");
                                    setTimeout(location.reload.bind(location), 1000);
                                } else {
                                    swal("Error", "Maaf terjadi kesalahan", "error");
                                }
                            }
                        });
                    } else {
                        swal.close();
                    }
                });
            });
        });

    </script>
@endpush