@if ($role == 'SPV')
    <x-navbar-spv />
@elseif ($role == 'ADMIN')
    <x-navbar-admin />
@endif
@extends('layouts.app')

@section('content')
    <div class="container d-flex tw-justify-center">
        <div class="card w-75">
            <div class="card-header">
                <p class="m-0">Form Penilaian</p>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="row">
                        <div class="col-md-2">NIP</div>
                        <div class="col">: {{ $pegawai->nip }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Nama</div>
                        <div class="col">: {{ $pegawai->nama }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Jabatan</div>
                        <div class="col">: {{ $pegawai->jabatan->jabatan }}</div>
                    </div>
                </div>
                <form action="{{ $role == 'SPV' ? route('spv.penilaian.store', ['periode_id' => $periode->id, 'pegawai_id' => $pegawai->id]) : route('admin.penilaian.store', ['periode_id' => $periode->id, 'pegawai_id' => $pegawai->id]) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="btn btn-sm btn-primary tw-bg-[#007bff] text-white tw-px-4 tw-my-2 tw-self-end">Simpan <i
                            class="bi bi-clipboard-check"></i></button>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="tw-font-semibold">
                                <td>Kriteria</td>
                                <td>Deskripsi</td>
                                <td class="text-center">Bobot</td>
                                <td class="text-center">Tipe</td>
                                <td class="text-center">Nilai</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $item->kriteria->kriteria?? $item->kriteria }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td class="text-center">{{ $item->bobot }}</td>
                                <td class="text-center">{{ $item->tipe }}</td>
                                <td class="tw-w-30">
                                    <input type="hidden" name="data[{{ $key }}][kriteria_id]" value="{{ $item->kriteria_id }}">
                                    <input min="0" max="5" class="rounded active:tw-border-0 w-100 tw-text-start tw-ps-1" type="number"
                                        name="data[{{ $key }}][value]" value="{{ $item->nilai ?? 'null' }}"
                                        placeholder="0 - 5" id="nilaiInput" required>
                                </td>
                            </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>
@endsection
