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
                <p class="tw-font-semibold">Laporan Penilaian: Periode {{ $periode->id }}, {{ $periode->bulan }} -
                    {{ $periode->tahun }}</p>

            </div>
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
