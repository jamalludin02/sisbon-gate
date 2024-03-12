<x-navbar-admin />
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="tw-bg-white tw-p-5 tw-rounded tw-mb-5 tw-min-h">
            <nav aria-label="breadcrumb m-0 p-0 tw-mx-auto ">
                <ol class="breadcrumb tw-text-black-500 tw-h-auto tw-mb-0">
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('admin.jabatan') }}">Jabatan</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Edit / {{ $data->id }} </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-header">Edit Data Jabatan</div>
            <div class="card-body tw-overflow-auto tw-p-10">
                <form class="justify-content-between row " action="{{ route('admin.jabatan.update', $data->id) }}"
                    method="POST">
                    @csrf
                    <div class="col-md">
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="jabatan" class="col-md-3 form-label pt-2 ps-0">Jabatan</label>
                                <input type="text" class="col-md form-control" id="jabatan" name="jabatan"
                                    value="{{ $data->jabatan }}" />
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="gaji_harian" class="col-md-3 form-label align-middle pt-2 ps-0">Gaji
                                    Harian</label>
                                <input type="text" class="col-md form-control" id="gaji_harian" name="gaji_harian"
                                    value="{{ $data->gaji_harian }}" />
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end pe-0 me-0">
                        <a href="{{ route('admin.jabatan') }}" class="btn btn-secondary btn-sm w-auto px-3 me-2"
                            role="button">Kembali</a>
                        <a class="btn btn-danger btn-sm w-auto px-3 me-2" data-bs-toggle="modal" href="#exampleModal"
                            role="button" v-if="id">Hapus</a>
                        <button class="btn btn-primary btn-sm w-auto px-3 tw-bg-[#007bff]" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header tw-justify-between">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                        <button type="button" class="btn-close btn-sm tw-text-black" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm tw-bg-[#6c757d]"
                            data-bs-dismiss="modal">Close</button>
                        <a href="{{ route('admin.jabatan.delete', $data->id) }}"
                            class="btn btn-danger btn-sm tw-bg-[#dc3545]">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- tutup modal --}}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mendapatkan elemen dengan ID 'gaji_harian'
            const gajiHarianInput = document.getElementById('gaji_harian');

            gajiHarianInput.value = formatRupiah(gajiHarianInput.value, 'Rp. ');
            // Menambahkan event listener untuk mendeteksi setiap kali pengguna mengetik
            gajiHarianInput.addEventListener('input', function (e) {
                // Memformat nilai input dan menetapkannya kembali ke input
                gajiHarianInput.value = formatRupiah(this.value, 'Rp. ');
            });

            // Fungsi untuk memformat angka menjadi format Rupiah
            function formatRupiah(angka, prefix) {
                const numberString = angka.replace(/[^,\d]/g, '');
                const split = numberString.split(',');
                const sisa = split[0].length % 3;
                let rupiah = split[0].substr(0, sisa);
                const ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    const separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;

                return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        });
    </script>
@endsection
    