@if ($role == 'SPV')
    <x-navbar-spv />
@elseif ($role == 'ADMIN')
    <x-navbar-admin />
@endif
@extends('layouts.app')

@section('content')
    <div class="container d-flex tw-justify-center">
        <div class="card w-75">
            <div class="card-header">
                <p class="m-0">Pilih Pegawai</p>
            </div>
            <div class="card-body tw-p-5">
                <div>
                    <div class="row">
                        <div class="row col-md">
                            <div class="col-md-3">Tahun</div>
                            <div class="col-md">: {{ $periode->tahun }}</div>
                        </div>
                        <div class="row col-md">
                            <div class="col-md-3">Bulan</div>
                            <div class="col-md">:
                                {{ \Carbon\Carbon::createFromDate(null, intVal($periode->bulan), 10)->locale('id')->monthName }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row col-md">
                            <div class="col-md-3">Terbit</div>
                            <div class="col-md">: {{ $periode->terbit }}</div>
                        </div>
                        <div class="row col-md">
                            <div class="col-md-3">tutup</div>
                            <div class="col-md">: {{ $periode->tutup }}</div>
                        </div>
                    </div>
                </div>

                <div class="tw-mt-5">
                    @foreach ($pegawai as $item)
                        <div class=" w-100 mx-0 my-2 tw-h-20 tw-align-middle border tw-rounded tw-shadow ">
                            <div class="row d-flex tw-justify-end h-100 tw-mx-3">
                                <div class="col-md-10 my-auto">
                                    <div class="row col-md">
                                        <div class="col-md-2">NIP</div>
                                        <div class="col-md">: {{ $item->nip }}</div>
                                    </div>
                                    <div class="row col-md">
                                        <div class="col-md-2">Nama</div>
                                        <div class="col-md">:
                                            {{ $item->nama }}
                                        </div>
                                    </div>
                                    <div class="row col-md">
                                        <div class="col-md-2">Jabatan</div>
                                        <div class="col-md">:
                                            {{ $item->jabatan->jabatan }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center tw-my-auto ">
                                    <a href="{{ $role == 'SPV' ? route('spv.penilaian.form', [$periode->id, $item->id]) : route('admin.penilaian.form', [$periode->id, $item->id]) }}"
                                        class="text-center tw-bg-green-500 tw-text-white tw-py-2 tw-px-6 tw-w-100 tw-mx-0 tw-rounded">Nilai
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
