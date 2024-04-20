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
                <form action="{{ $role == 'ADMIN' ? route('admin.laporan-presensi') : route('spv.laporan-presensi') }}" method="get"
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
                <a href="{{ route('print.laporan-presensi', ['year' => $selectedYear, 'month' => $selectedMonth]) }}"
                    target="_blank" class="btn btn-sm btn-danger tw-my-1">Print as PDF <i class="bi bi-printer"></i></a>
                <div class="tw-overflow-auto">
                    <table class="table table-bordered tw-border-gray-400 tw-text-[10px]">
                        <tr style="background-color:  #d9d9d9">
                            <td style="background-color:  #d9d9d9" rowspan="2" class="tw-align-middle tw-bg-gray-300">NIP
                            </td>
                            <td style="background-color:  #d9d9d9" rowspan="2" class="tw-align-middle ">Nama</td>
                            <td style="background-color:  #d9d9d9" rowspan="2" class="tw-align-middle">Jabatan</td>
                            <td style="background-color:  #d9d9d9">Hari</td>
                            @foreach ($arrDay['hari'] as $item)
                                <td style="background-color:  #d9d9d9" class="text-center">{{ $item }}</td>
                            @endforeach
                        </tr>
                        <tr style="background-color:  #d9d9d9">
                            <td style="background-color:  #d9d9d9">Tanggal</td>
                            @foreach ($arrDay['tgl'] as $item)
                                <td style="background-color:  #d9d9d9" class="text-center">{{ $item }}</td>
                            @endforeach
                        </tr>

                        @foreach ($arrAttPegawai as $keyAtt => $itemAtt)
                            <tr>
                                @foreach ($itemAtt['data'] as $key => $item)
                                    @if ($key != 'id' && $key != 'gaji_harian')
                                        <td style="white-space: nowrap;">{{ $item }}</td>
                                    @endif
                                @endforeach
                                <td></td>
                                @foreach ($itemAtt['presensi'] as $item)
                                    <td>{{ $item }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="tw-my-5">
                    <p class="tw-font-semibold">Keterangan:</p>
                <p class="tw-text-xs ">H = Hadir, A = Alpha, S = Sakit, I = Izin, C = Cuti, L = Libur</p>
                </div>
            </div>
        </div>
    </div>
@endsection
