<x-navbar-spv />
@extends('layouts.app')

@section('content')
    <div class="container d-flex tw-justify-center">
        <div class="card w-75">
            <div class="card-header">
                <p class="m-0">Form Penilaian</p>
            </div>
            <div class="card-body">
              
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="tw-font-semibold">
                            <td>Kriteria</td>
                            <td>Deskripsi</td>
                            <td class="text-center">Bobot</td>
                            <td class="text-center">Nilai</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriteria as $key => $item)
                            <tr>
                                <td>{{ $item->kriteria }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td class="text-center">{{ $item->bobot }}</td>
                                <td class="tw-w-30">
                                    <input class="rounded active:tw-border-0 w-100 tw-text-end" type="number"
                                        name="nilai" value="1" id="nilaiInput" min="1" max="10"
                                        placeholder="Masukkan nilai">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
