    <x-navbar-spv />
    @extends('layouts.app')
    @section('content')
        <div class="px-5">
            <div class="alert alert-light fs-4 fw-bold text-center" role="alert">
                <p> Dashboard Supervisor</p>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex">
                        <div class=" w-75">
                            <div id="container" style="width:100%; height:400px;"></div>
                        </div>
                        <div class="w-25">
                            <div class="alert alert-light fw-bold fs-5 shadow text-center" role="alert">
                                <p>Top 10 Rank Periode Terakahir</p>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Rank</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rank as $index => $item)
                                            <tr class="justify-content-center px-auto">
                                                @if ($index + 1 < 4)
                                                    <th scope="row" class="justify-content-center text-center">
                                                        <img class="mX-auto"
                                                            src="{{ asset('assets/images/' . ($index + 1) . '-icon.png') }}"
                                                            style="width: 18px;" alt="" srcset="">
                                                    </th>
                                                @else
                                                    <th scope="row" class="justify-content-center text-center">
                                                        {{ $index + 1 }}</th>
                                                @endif
                                                <td>{{ $item['nama'] }}</td>
                                                <td>{{ $item['jabatan'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="absensi" style="width:100%; height:400px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <script script src="https://code.highcharts.com/highcharts.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const categoriesPenilaian = {!! json_encode($dataPenilaian['categories']) !!};
                const seriesPenilaian = {!! json_encode($dataPenilaian['result']) !!};


                console.log(categoriesPenilaian);
                const chart = Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Rerata Nilai Per Jabatan',
                        align: 'left'
                    },
                    xAxis: {
                        categories: categoriesPenilaian,
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Nilai Preferensi'
                        }
                    },

                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: seriesPenilaian,
                });
            });




            document.addEventListener('DOMContentLoaded', function() {
                const categories = {!! json_encode($dataPresensi['categories']) !!};
                const series = {!! json_encode($dataPresensi['series']) !!};


                // console.log(series);
                const chart = Highcharts.chart('absensi', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Grafik Absensi Pegawai',
                        align: 'left'
                    },
                    xAxis: {
                        categories: categories,
                        crosshair: true,
                        accessibility: {
                            description: 'Bulan'
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Jumlah Status Presensi'
                        }
                    },

                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: series,
                });
            });
        </script>
    @endsection
