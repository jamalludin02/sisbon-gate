@if ($role == 'SPV')
    <x-navbar-spv />
@elseif ($role == 'ADMIN')
    <x-navbar-admin />
@endif
@extends('layouts.app')

@section('content')
    <div class="container d-flex tw-justify-center">
        <div class="card w-50">
            <div class="card-header">
                <p class="m-0">Periode</p>
            </div>
            <div class="card-body tw-p-5">
                @if (isset($data))
                    <div>
                        <div class="row">
                            <div class="row col-md">
                                <div class="col-md-3">Tahun</div>
                                <div class="col-md">: {{ $data->tahun }}</div>
                            </div>
                            <div class="row col-md">
                                <div class="col-md-3">Bulan</div>
                                <div class="col-md">:
                                    {{ \Carbon\Carbon::createFromDate(null, intVal($data->bulan), 10)->locale('id')->monthName }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md">
                                <div class="col-md-3">Terbit</div>
                                <div class="col-md">: {{ $data->terbit }}</div>
                            </div>
                            <div class="row col-md">
                                <div class="col-md-3">tutup</div>
                                <div class="col-md">: {{ $data->tutup }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md">
                                <div class="col-md-3">Status</div>
                                <div class="col-md">: {{ $data->status }}</div>
                            </div>
                            <div class="row col-md">
                                <div class="col-md-3"></div>
                                <div class="col-md"></div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex tw-justify-end">
                            <a href="{{ $role == 'SPV' ? route('spv.penilaian.select', $data->id) : route('admin.penilaian.select', $data->id) }}"
                                class="btn btn-primary tw-px-4 tw-py-1">Mulai</a>
                        </div>
                    </div>
                @else
                    <div class="text-center  ">
                        <h1 class="tw-my-10">Periode penilaian Belum Tersedia ... </h1>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
