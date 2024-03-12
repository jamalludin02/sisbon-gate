<x-navbar-spv />
@extends('layouts.app')
@section('content')
    <div class="container tw-h-auto">
        <div class="card">
            <div class="card-header w-100 d-flex justify-content-between align-items-center">
                <p class="m-0 d-flex">Absensi Pegawai</p>
                <form action="{{ route('spv.absensi') }}" method="get" class="d-flex w-50 justify-content-end">
                    <p class="mx-2 align-self-center w-50 tw-text-right">Pilih Absensi</p>
                    <select class="form-select form-select-sm w-25" aria-label=".form-select-sm example" name="year">
                        <option selected disabled value="">Pilih Tahun</option>
                        @for ($i = $firstYearList; $i <= $selectedYear + 5; $i++)
                            <option {{ $i == $selectedYear ? 'selected' : '' }} value="{{ $i }}">
                                {{ $i }}</option>
                        @endfor
                    </select>

                    <select class="form-select form-select-sm w-25" aria-label=".form-select-sm example" name="month">
                        <option selected disabled>Pilih Bulan</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option {{ $selectedMonth == $i ? 'selected' : '' }} value="{{ $i }}">
                                {{ \Carbon\Carbon::createFromDate(null, intVal($i), 10)->locale('id')->monthName }}
                                {{-- {{ \Carbon\Carbon::createFromDate(null, $i, null)->monthName }} --}}
                            </option>
                        @endfor
                    </select>
                    <button type="submit" class="d-flex mx-2 btn btn-sm tw-bg-[#007bff] tw-text-white">Cari <i
                            class="tw-ms-2 align-items-center tw-mx-auto bi bi-search"></i></button>
                </form>
            </div>

            <div class="card-body w-100 tw-px-10">
                <div class="text-center w-100 tw-font-bold tw-text-4xl  tw-w-auto d-flex tw-justify-center">
                    <p id="timestamp" class="tw-bg-black tw-text-white tw-px-10 tw-rounded"></p>
                </div>
                <p class="tw-font-semibold">* Note: Absensi hanya dapat dilakukan pada hari kerja dan jam kerja</p>
                @foreach ($arrDay as $item)
                    <div class=" w-100 mx-0 my-2 tw-h-16 tw-align-middle border tw-rounded tw-shadow">
                        <div class="row d-flex tw-justify-end h-100 tw-mx-3">
                            @php
                                $orderdate = explode('-', $item->tgl);
                                $year = $orderdate[0];
                                $month = $orderdate[1];
                                $day = $orderdate[2];
                            @endphp
                            <div class="col-md-10 my-auto"> {{ $item->hari }},
                                {{ $day }}-{{ $month }}-{{ $year }} </div>
                            <div class="col-md-2 text-center tw-my-auto">
                                @if ($item->status == 'enable')
                                    <a href="{{ route('spv.absensi.form', ['year' => $year, 'month' => $month, 'day' => $day, 'dayName' => $item->hari]) }}"
                                        class="text-center tw-bg-green-500 tw-text-white tw-py-2 tw-px-3 tw-w-100 tw-mx-0 tw-rounded">Tersedia
                                    </a>
                                @else
                                    <p
                                        class=" text-center tw-bg-red-500 tw-text-white tw-py-2 tw-px-3 tw-w-100 tw-mx-0 tw-rounded">
                                        Tidak
                                        Tersedia</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk mengambil timestamp
            function getTimestamp() {
                $.ajax({
                    url: '{{ route('timestamp') }}',
                    success: function(data) {
                        $('#timestamp').html(data.timestamp);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Set interval ke fungsi getTimestamp (misalnya, setiap 5 detik)
            setInterval(getTimestamp, 1000);
        });
    </script>
@endsection
