@if ($role == 'SPV')
    <x-navbar-spv />
@elseif ($role == 'ADMIN')
    <x-navbar-admin />
@endif


@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="tw-bg-white tw-p-5 tw-rounded tw-mb-5 tw-min-h">
        <nav aria-label="breadcrumb m-0 p-0 tw-mx-auto ">
            <ol class="breadcrumb tw-text-black-500 tw-h-auto tw-mb-0">
                <li class="breadcrumb-item active" aria-current="page">Laporan</li>
            </ol>
        </nav>
    </div> --}}
        {{-- @dd($periode) --}}
        <div class="card">
            <div class="card-header w-100 d-flex justify-content-between align-items-center py-auto">
                <p class="m-0 d-flex">Absensi Pegawai</p>
                <form action="{{ $role == 'ADMIN' ? route('admin.laporan-penilaian') : route('spv.laporan-penilaian') }}" method="get"
                    class="d-flex row w-50 justify-content-end  my-auto">
                    @csrf
                    @php
                        $idSelected = request()->get('id');
                    @endphp

                    <select class="form-select form-select-sm w-50 mx-1" aria-label=".form-select-sm example" name="id">
                        <option selected disabled value="">Pilih Periode</option>
                        @foreach ($list as $item)
                            <option {{ $idSelected == $item->id ? 'selected' : '' }} value="{{ $item->id }}">
                                Periode {{ $item->id }}, {{ $item->bulan }} - {{ $item->tahun }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="d-flex mx-1 tw-w-20 btn btn-sm tw-bg-[#007bff] tw-text-white tw-px-auto">
                        <div class="d-flex mx-auto">
                            <p>Cari</p>
                            <i class="bi bi-search align-self-center tw-ml-2"></i>
                        </div>
                    </button>
                </form>
            </div>
            <div class="card-body">
                <a href="{{ route('print.laporan-penilaian', ['id' => $periode->id]) }}" target="_blank"
                    class="btn btn-sm btn-danger tw-my-1">Print as PDF <i class="bi bi-printer"></i></a>
                <div class="tw-overflow-auto">
                    <table class="table table-bordered table-striped tw-text-sm ">
                        <thead>
                            <tr class="tw-font-semibold">
                                <td class="tw-w-14">Rangking</td>
                                <td>Nip</td>
                                <td>Nama</td>
                                <td>Jabatan</td>
                                <td class="text-center">Positif</td>
                                <td class="text-center">Negatif</td>
                                <td class="text-center">Preferensi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="tw-w-14">{{ $item['nip'] }}</td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['jabatan'] }}</td>
                                    <td class="text-center">{{ $item['positif'] }}</td>
                                    <td class="text-center">{{ $item['negatif'] }}</td>
                                    <td class="text-center tw-w-14">{{ $item['preferensi'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
