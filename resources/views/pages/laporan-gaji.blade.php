@if ($role == 'SPV')
    <x-navbar-spv />
@elseif ($role == 'ADMIN')
    <x-navbar-admin />
@endif
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header w-100 d-flex justify-content-between align-items-center py-auto">
                <p class="m-0 d-flex">Absensi Pegawai</p>
                <form action="{{ $role == 'ADMIN' ? route('admin.laporan-gaji') : route('spv.laporan-gaji') }}" method="get"
                    class="d-flex row w-50 justify-content-end  my-auto">
                    @csrf
                    <p class="mx-2 align-self-center w-25 tw-text-right">Pilih Absensi</p>
                    <select class="form-select form-select-sm w-25 mx-1" aria-label=".form-select-sm example" name="year">
                        <option selected disabled value="">Pilih Tahun</option>
                        @for ($i = $firstYearList; $i <= $selectedYear + 5; $i++)
                            <option {{ $i == $selectedYear ? 'selected' : '' }} value="{{ $i }}">
                                {{ $i }}</option>
                        @endfor
                    </select>

                    <select class="form-select form-select-sm w-25 mx-1" aria-label=".form-select-sm example"
                        name="month">
                        <option selected disabled>Pilih Bulan</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option {{ $selectedMonth == $i ? 'selected' : '' }} value="0{{ $i }}">
                                {{ \Carbon\Carbon::createFromDate(null, intVal($i), 10)->locale('id')->monthName }}
                            </option>
                        @endfor
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
                @if ($data)
                    <a href="{{ route('print.laporan-gaji', ['year' => $selectedYear, 'month' => $selectedMonth]) }}"
                        target="_blank" class="btn btn-sm btn-danger tw-my-1">Print as PDF <i class="bi bi-printer"></i></a>
                   <div class="tw-overflow-auto">
                    <table class="table table-bordered table-striped tw-text-sm">
                        <thead>
                            <tr>
                                <th class="tw-align-middle">Rangking Penilaian</th>
                                <th class="tw-align-middle">NIP</th>
                                <th class="tw-align-middle">Nama</th>
                                <th class="tw-align-middle">Jabatan</th>
                                <th class="tw-align-middle">Hadir</th>
                                <th class="tw-align-middle">Alpha</th>
                                <th class="tw-align-middle">Sakit</th>
                                <th class="tw-align-middle">Izin</th>
                                <th class="tw-align-middle">Cuti</th>
                                <th class="tw-align-middle">Libur</th>
                                <th class="tw-align-middle">Gaji Harian</th>
                                <th class="tw-align-middle">Gaji</th>
                                <th class="tw-align-middle">Bonus Gaji</th>
                                <th class="tw-align-middle">Total Gaji</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="tw-align-middle text-center ">{{ $item['rangking'] }}</td>
                                    <td class="tw-align-middle">{{ $item['nip'] }}</td>
                                    <td class="tw-align-middle">{{ $item['nama'] }}</td>
                                    <td class="tw-align-middle">{{ $item['jabatan'] }}</td>
                                    <td class="tw-align-middle">{{ $item['hadir'] }}</td>
                                    <td class="tw-align-middle">{{ $item['alpha'] }}</td>
                                    <td class="tw-align-middle">{{ $item['sakit'] }}</td>
                                    <td class="tw-align-middle">{{ $item['izin'] }}</td>
                                    <td class="tw-align-middle">{{ $item['cuti'] }}</td>
                                    <td class="tw-align-middle">{{ $item['libur'] }}</td>
                                    <td class="tw-align-middle tw-whitespace-nowrap" style="white-space: nowrap">Rp.
                                        {{ number_format($item['gaji_harian'], 0, ',', '.') }}</td>
                                    <td class="tw-align-middle tw-whitespace-nowrap" style="white-space: nowrap">Rp.
                                        {{ number_format($item['gaji'], 0, ',', '.') }}</td>

                                    <td class="tw-align-middle tw-whitespace-nowrap" style="white-space: nowrap">Rp.
                                        {{ number_format($item['bonus_gaji'], 0, ',', '.') }}</td>
                                    <td class="tw-align-middle tw-whitespace-nowrap" style="white-space: nowrap">Rp.
                                        {{ number_format($item['total_gaji'], 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   </div>
                @else
                 <p class="text-center">Data tahun {{ $selectedYear }} & bulan {{ \Carbon\Carbon::createFromDate(null, intVal($selectedMonth), 10)->locale('id')->monthName }} tidak ditemukan</p>
                @endif
            </div>
        </div>
    </div>
@endsection
