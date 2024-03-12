


@extends('layouts.app')
@section('content')
 



    <div class="container">
        <div class="alert alert-light text-center" role="alert">
            <h1><strong>ROVA JANCOKK!!!</strong></h1>
        </div>

        <div class="card">
            <div class="card-header">
                <p class="m-0">Data Absensi</p>
            </div>
            {{-- @php
                $currentYear = date('Y');
                $currentMonth = date('m');
                $firstYearList = $currentYear - 5;
                // dd($currentYear, $currentMonth, $firstYearList);
            @endphp
            <div class="card-header w-100 d-flex justify-content-between align-items-center">
                <p class="m-0">Absensi Pegawai</p>
                <div class="d-flex w-50 justify-content-end">
                    <p class="mx-2 align-self-center w-50 tw-text-right">Pilih Absensi</p>
                    <select class="form-select form-select-sm w-25" aria-label=".form-select-sm example" name="tahun">
                        <option selected disabled value="">Pilih Tahun</option>
                        @for ($i = $firstYearList; $i <= $currentYear + 5; $i++)
                            <option {{ $i == $currentYear ? 'selected' : '' }} {{$i > $currentYear ? 'disabled' : ''}} value="{{ $i }}">
                                {{ $i }}</option>
                        @endfor
                    </select>

                    <select class="form-select form-select-sm w-25" aria-label=".form-select-sm example">
                        <option selected>Pilih Bulan</option>
                        <option {{$currentMonth == "1" ? 'selected': ''}} {{$currentMonth < "1"? 'disabled': ''}} value="1">Januari</option>
                        <option {{$currentMonth == "2" ? 'selected': ''}} {{$currentMonth < "2"? 'disabled': ''}} value="2">Februari</option>
                        <option {{$currentMonth == "3" ? 'selected': ''}} {{$currentMonth < "3"? 'disabled': ''}} value="3">Maret</option>
                        <option {{$currentMonth == "4" ? 'selected': ''}} {{$currentMonth < "4"? 'disabled': ''}} value="4">April</option>
                        <option {{$currentMonth == "5" ? 'selected': ''}} {{$currentMonth < "5"? 'disabled': ''}} value="5">Mei</option>
                        <option {{$currentMonth == "6" ? 'selected': ''}} {{$currentMonth < "6"? 'disabled': ''}} value="6">Juni</option>
                        <option {{$currentMonth == "7" ? 'selected': ''}} {{$currentMonth < "7"? 'disabled': ''}} value="7">Juli</option>
                        <option {{$currentMonth == "8" ? 'selected': ''}} {{$currentMonth < "8"? 'disabled': ''}} value="8">Agustus</option>
                        <option {{$currentMonth == "9" ? 'selected': ''}} {{$currentMonth < "9"? 'disabled': ''}} value="9">September</option>
                        <option {{$currentMonth == "10" ? 'selected': ''}} {{$currentMonth < "10"? 'disabled': ''}} value="10">Oktober</option>
                        <option {{$currentMonth == "11" ? 'selected': ''}} {{$currentMonth < "11"? 'disabled': ''}} value="11">November</option>
                        <option {{$currentMonth == "12" ? 'selected': ''}} {{$currentMonth < "12"? 'disabled': ''}} value="12">Desember</option>
                    </select>
                    <button type="submit"class="d-flex mx-2 btn btn-sm tw-bg-[#007bff] tw-text-white">Cari <i
                            class="tw-ms-2 align-items-center tw-mx-auto bi bi-search"></i></button>
                </div>
            </div> --}}

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- <div class="text-center m-3">
                    @foreach ($paginationLinks as $link)
                        @if ($link['year'] == $selectedYear && $link['month'] == $selectedMonth)
                            <span class="mr-2 font-weight-bold tw-bg-yellow-200">
                                {{ $link['fullName'] }}
                            </span>
                        @else
                            <a class="mr-2 font-weight-bold"
                                href="{{ url('/', ['year' => $link['year'], 'month' => $link['month']]) }}">
                                {{ $link['fullName'] }}
                            </a>
                        @endif
                    @endforeach
                </div> --}}
                <form action="{{ route('store-presensi', ['year' => $selectedYear, 'month' => $selectedMonth]) }}"
                    method="post">
                    @csrf
                    <div class="table-responsive">
                        <table
                            class=" table-sm table-bordered table-striped table-hover datatable border-2 tw-border-gray-400">
                            <thead>
                                <tr>
                                    <th class="tw-w-64">Pegawai/Tanggal</th>
                                    @for ($i = 1; $i <= $daysInMonth; $i++)
                                        <th style="width: 35px" class="text-center">{{ $i }}</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pegawai as $value)
                                    <tr>
                                        <td>{{ $value->nama }}</td>
                                        @for ($i = 1; $i <= $daysInMonth; $i++)
                                            @php
                                                $day = now()
                                                    ->setYear($selectedYear)
                                                    ->setMonth($selectedMonth)
                                                    ->setDay($i);
                                            @endphp
                                            @if ($i == now()->day)
                                                <td style="width: 100px" class="tw-bg-white">
                                                    <select class="tw-bg-white"
                                                        name="student_{{ $value->id }}[{{ $day->format('Y-m-d') }}]">
                                                        @foreach (['HADIR', 'ALPA', 'SAKIT', 'IZIN', 'CUTI'] as $status)
                                                            <option value="{{ $status }}">
                                                                {{ $status }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            @elseif ($i < now()->day)
                                                <td class="tw-bg-gray-300"> <span class=" tw-px-3 tw-rounded">
                                                        HADIR </span></td>
                                            @elseif ($i > now()->day)
                                                <td class="tw-bg-gray-300 "><span class="mx-3 tw-px-3 tw-rounded"> -
                                                    </span></td>
                                            @endif
                                        @endfor
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <input class="mt-2 px-4 btn btn-sm tw-bg-[#007bff] tw-text-white" type="submit" value="Save">
                </form>
            </div>
        </div>
    </div>
@endsection
