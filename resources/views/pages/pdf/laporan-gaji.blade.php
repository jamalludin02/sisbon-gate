@extends('layouts.app')

@section('content')
    <div class="tw-bg-white tw-fixed tw-top-0 tw-left-0 tw-w-screen tw-h-screen p-3 justify-content-center">
        <div class="w-100 tw-mb-2 justify-content-center" id="kop">
            <div class=" tw-justify-self-center text-center tw-border-b-2 tw-border-black">
                <p class="tw-text-2xl">CV.Graha Raharja</p>
                <p class="tw-text-1xl">Tesan, Tritunggal, Kec. Babat, Kabupaten Lamongan, Jawa Timur 62771</p>
                <p class="tw-text-1xl">Telp: 0813-3930-5098</p>

            </div>
        </div>
        <div class="w-100 tw-px-10 tw-mb-2 justify-content-center" id="body">
            <div class="tw-my-10">
                <p class="tw-font-semibold">Laporan Gaji Karyawan: {{ \Carbon\Carbon::createFromDate(null, intVal($month), 10)->locale('id')->monthName }} - {{$year}}</p>
            </div>
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
                            <td class="tw-align-middle tw-whitespace-nowrap">Rp.
                                {{ number_format($item['gaji_harian'], 0, ',', '.') }}</td>
                            <td class="tw-align-middle tw-whitespace-nowrap">Rp.
                                {{ number_format($item['gaji'], 0, ',', '.') }}</td>

                            <td class="tw-align-middle tw-whitespace-nowrap">Rp.
                                {{ number_format($item['bonus_gaji'], 0, ',', '.') }}</td>
                            <td class="tw-align-middle tw-whitespace-nowrap">Rp.
                                {{ number_format($item['total_gaji'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Function to trigger print when document is ready
            function printA4Landscape() {
                window.print(); // Trigger print dialog
            }

            printA4Landscape(); // Call the print function when document is ready
        });
    </script>
@endpush

@push('styles')
    <style>
        @media print {
            @page {
                size: A4 landscape;
            }

            body {
                margin: 0;
                padding: 0;
            }
        }
    </style>
@endpush
