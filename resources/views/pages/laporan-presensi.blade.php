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
                <form action="{{ route('admin.laporan-presensi') }}" method="get" class="d-flex row w-50 justify-content-end  my-auto">
                    @csrf
                    <p class="mx-2 align-self-center w-25 tw-text-right">Pilih Absensi</p>
                    <select class="form-select form-select-sm w-25 mx-1" aria-label=".form-select-sm example" name="year">
                        <option selected disabled value="">Pilih Tahun</option>
                        @for ($i = $firstYearList; $i <= $selectedYear + 5; $i++)
                            <option {{ $i == $selectedYear ? 'selected' : '' }} value="{{ $i }}">
                                {{ $i }}</option>
                        @endfor
                    </select>

                    <select class="form-select form-select-sm w-25 mx-1" aria-label=".form-select-sm example" name="month">
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
            <div class="card-body tw-overflow-auto">
                {{-- <a href="{{ route('print.laporan-penilaian', ['id' => $periode->id]) }}" target="_blank"
                    class="btn btn-sm btn-danger tw-my-1">Print as PDF <i class="bi bi-printer"></i></a> --}}
                {{-- <table border>
                        <caption>A more complex table</caption>
                        <th rowspan=2><th colspan=2>average<th rowspan=2>other<br>category<tr>
                        <th>height <th>weight <tr>
                        <th align=left>males <td>1.9 <td>0.003 <td>yyy <tr>
                        <th align=left>females <td>1.7 <td>0.002 <td>xxx
                        </table> --}}
                <table class="table table-bordered tw-text-[10px]">
                    <tr class="tw-bg-gray-300">
                        <td rowspan="2" class="tw-align-middle">NIP</td>
                        <td rowspan="2" class="tw-align-middle">Nama</td>
                        <td rowspan="2" class="tw-align-middle">Jabatan</td>
                        <td >Hari</td>
                        @foreach ($arrDay['hari'] as $item)
                            <td>{{ $item }}</td>
                        @endforeach
                    </tr>
                    <tr class="tw-bg-gray-300">
                        <td>Tanggal</td>
                        @foreach ($arrDay['tgl'] as $item)
                            <td>{{ $item }}</td>
                        @endforeach
                    </tr>
                    @foreach ($arrAttPegawai as $keyAtt => $itemAtt)
                        <tr>
                            @foreach ($itemAtt as $item)
                            <td>{{ $item }}</td>
                        @endforeach
                        </tr>
                    @endforeach                    


                </table>
            </div>
        </div>
    </div>
@endsection
