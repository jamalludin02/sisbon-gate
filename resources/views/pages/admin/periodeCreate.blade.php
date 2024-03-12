<x-navbar-admin />

@extends('layouts.app')

@section('content')
    @php
        $yearCurrent = $year;
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
                    <li class="breadcrumb-item" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-header">Edit Data Periode Penilaian</div>
            <div class="card-body tw-overflow-auto tw-p-10">
                <form class="justify-content-between row " action="{{ route('admin.periode-penilaian.created') }}"
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
                                        <option value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="bulan" class="col-md-3 form-label align-middle pt-2 ps-0">Bulan</label>
                                <select class="col-md form-select" aria-label="Default select example" id="bulan"
                                    name="bulan" required>
                                    <option disabled selected value="">Pilih Bulan</option>
                                    @foreach ($arrBulan as $index => $bulan)
                                        <option value="{{ $index + 1 }}">
                                            {{ $bulan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="terbit" class="col-md-3 form-label pt-2 ps-0">Terbit</label>
                                <input type="date" class="col-md form-control" id="terbit" name="terbit"
                                    value="" />
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <div class="row col-md mb-3 me-2">
                                    <label for="tutup" class="col-md-3 form-label pt-2 ps-0">Tutup</label>
                                    <input type="date" class="col-md form-control" id="tutup" name="tutup"
                                        value="" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="row col-md mb-3 me-2">
                                    <label for="status" class="col-md-3 form-label align-middle pt-2 ps-0">Status</label>
                                    <select class="col-md form-select" aria-label="Default select example" id="status"
                                        name="status" required>
                                        <option disabled selected value="">Pilih Status</option>
                                        <option value="DIBUKA">DIBUKA</option>
                                        <option value="DITUTUP">DITUTUP</option>
                                    </select>
                                </div>
                                <div class="row col-md input-group-sm mb-3">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end pe-0 me-0">
                            <a href="{{ route('admin.periode-penilaian') }}"
                                class="btn btn-secondary btn-sm w-auto px-3 me-2" role="button">Kembali</a>
                            <button class="btn btn-primary btn-sm w-auto px-3 tw-bg-[#007bff]"
                                type="submit">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
