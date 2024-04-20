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
                <p class="tw-font-semibold">Laporan Presensi Karyawan:
                    {{ \Carbon\Carbon::createFromDate(null, intVal($month), 10)->locale('id')->monthName }} -
                    {{ $year }}</p>
            </div>
            <table class="table table-bordered tw-border-gray-400 tw-text-[10px]  ">
                <tr style="background-color:  #d9d9d9">
                    <td class="text-center" style="background-color:  #d9d9d9" colspan="{{ count($arrDay['tgl']) + 4 }}">
                        Tanggal</td>
                </tr>
                <tr style="background-color:  #d9d9d9">
                    <td style="background-color:  #d9d9d9" class="tw-align-middle tw-bg-gray-300">NIP
                    </td>
                    <td style="background-color:  #d9d9d9" class="tw-align-middle ">Nama</td>
                    <td style="background-color:  #d9d9d9" class="tw-align-middle">Jabatan</td>
                    {{-- <td style="background-color:  #d9d9d9">Hari</td> --}}
                    {{-- @foreach ($arrDay['hari'] as $item)
                        <td style="background-color:  #d9d9d9" class="text-center">{{ $item }}</td>
                    @endforeach --}}

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
                        @foreach ($itemAtt['presensi'] as $item)
                            <td>{{ substr($item, 0, 1) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
            <div>
                <p class="tw-font-semibold">Keterangan:</p>
                <ul class="tw-ms-5 tw-list-disc">
                    <li><p>H: Hadir</p> </li>
                    <li><p>A: Alpa</p> </li>
                    <li><p>S: Sakit</p> </li>
                    <li><p>I: Izin</p> </li>
                    <li><p>C: Cuti</p> </li>
                    <li><p>L: Libur</p> </li>
                </ul>
            </div>
            <div class="row"></div>
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
