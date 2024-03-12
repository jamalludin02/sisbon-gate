<x-navbar-admin />
@extends('layouts.app')

@section('content')
    @php
        $yearCurrent = $data->tahun;
        $firstYear = $yearCurrent - 5;
        $lastYear = $yearCurrent + 5;
        $arrBulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];
    @endphp
    <div class="container">
        <div class="tw-bg-white tw-p-5 tw-rounded tw-mb-5 tw-min-h">
            <nav aria-label="breadcrumb m-0 p-0 tw-mx-auto ">
                <ol class="breadcrumb tw-text-black-500 tw-h-auto tw-mb-0">
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('admin.periode-penilaian') }}">Periode Penilaian</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Edit / {{ $data->id }} </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-header">Edit Data Jabatan</div>
            <div class="card-body tw-overflow-auto tw-p-10">
                <form class="justify-content-between row " action="{{ route('admin.periode-penilaian.update', $data->id) }}"
                    method="POST">
                    @csrf
                    <div class="col-md">
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="tahun" class="col-md-3 form-label align-middle pt-2 ps-0">Tahun</label>
                                <select class="col-md form-select" aria-label="Default select example" id="tahun"
                                    name="tahun" required>
                                    <option disabled selected value="">Pilih Tahun</option>
                                    @for ($i = $firstYear; $i <= $lastYear; $i++)
                                        <option {{ $yearCurrent == $i ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                {{-- @dd($data->bulan) --}}
                                <label for="bulan" class="col-md-3 form-label align-middle pt-2 ps-0">Bulan</label>
                                <select class="col-md form-select" aria-label="Default select example" id="bulan"
                                    name="bulan" required>
                                    <option disabled selected value="">Pilih Bulan</option>
                                    @foreach ($arrBulan as $index => $bulan)
                                        <option {{ $data->bulan == $bulan ? 'selected' : '' }} value="{{$index+1}}">
                                            {{ $bulan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="terbit" class="col-md-3 form-label pt-2 ps-0">Terbit</label>
                                <input type="date" class="col-md form-control" id="terbit" name="terbit"
                                    value="{{$data->terbit}}" />
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <div class="row col-md mb-3 me-2">
                                    <label for="tutup" class="col-md-3 form-label pt-2 ps-0">Tutup</label>
                                    <input type="date" class="col-md form-control" id="tutup" name="tutup"
                                        value="{{$data->tutup}}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="row col-md mb-3 me-2">
                                    <label for="status" class="col-md-3 form-label align-middle pt-2 ps-0">Status</label>
                                    <select class="col-md form-select" aria-label="Default select example" id="status"
                                        name="status" required>
                                        <option disabled selected value="">Pilih Status</option>
                                        <option {{$data->status == "DIBUKA"? 'selected': ''}} value="DIBUKA">DIBUKA</option>
                                        <option {{$data->status == "DITUTUP"? 'selected': ''}} value="DITUTUP">DITUTUP</option>
                                    </select>
                                </div>
                                <div class="row col-md input-group-sm mb-3">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end pe-0 me-0">
                            <a href="{{ route('admin.periode-penilaian') }}"
                                class="btn btn-secondary btn-sm w-auto px-3 me-2" role="button">Kembali</a>
                            <a class="btn btn-danger btn-sm w-auto px-3 me-2" data-bs-toggle="modal" href="#exampleModal"
                                role="button" v-if="id">Hapus</a>
                            <button class="btn btn-primary btn-sm w-auto px-3 tw-bg-[#007bff]"
                                type="submit">Simpan</button>
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
                        <a href="{{ route('admin.periode-penilaian.delete', $data->id) }}"
                            class="btn btn-danger btn-sm tw-bg-[#dc3545]">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- tutup modal --}}
    </div>
@endsection
