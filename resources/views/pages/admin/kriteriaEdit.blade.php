<x-navbar-admin />
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="tw-bg-white tw-p-5 tw-rounded tw-mb-5 tw-min-h">
            <nav aria-label="breadcrumb m-0 p-0 tw-mx-auto ">
                <ol class="breadcrumb tw-text-black-500 tw-h-auto tw-mb-0">
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('admin.kriteria-penilaian') }}">Jabatan</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Edit / {{ $data->id }} </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-header">Edit Data Jabatan</div>
            <div class="card-body tw-overflow-auto tw-p-10">
                <form class="justify-content-between row "
                    action="{{ route('admin.kriteria-penilaian.update', $data->id) }}" method="POST">
                    @csrf
                    <div class="col-md">
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="kriteria" class="col-md-3 form-label pt-2 ps-0">Jabatan</label>
                                <input type="text" class="col-md form-control" id="kriteria" name="kriteria"
                                    value="{{ $data->kriteria }}" />
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="bobot" class="col-md-3 form-label align-middle pt-2 ps-0">Bobot</label>
                                <input type="number" min="0" max="5" class="col-md form-control" id="bobot" name="bobot"
                                    value="{{ $data->bobot }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="deskripsi" class="col-md-3 form-label align-middle pt-2 ps-0">Deskripsi</label>
                                <div class="col-md form-floating px-0">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="deskripsi" name="deskripsi" style="height: 85px"
                                        required>{{ $data->deskripsi }}</textarea>
                                </div>
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="Tipe"
                                    class="col-md-3 form-label align-middle pt-2 ps-0">Tipe</label>
                                <select class="col-md form-select" aria-label="Default select example" name="tipe" style="height: 40px"
                                    required>
                                    <option selected disabled value="">Pilih Tipe</option>
                                    <option {{$data->tipe == 'BENEFIT'? 'selected':''}} value="BENEFIT">BENEFIT</option>
                                    <option {{$data->tipe == 'COST'? 'selected':''}} value="COST">COST</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end pe-0 me-0">
                        <a href="{{ route('admin.kriteria-penilaian') }}" class="btn btn-secondary btn-sm w-auto px-3 me-2"
                            role="button">Kembali</a>
                        <a class="btn btn-danger btn-sm w-auto px-3 me-2" data-bs-toggle="modal" href="#exampleModal"
                            role="button" v-if="id">Hapus</a>
                        <button class="btn btn-primary btn-sm w-auto px-3 tw-bg-[#007bff]" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header tw-justify-between">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                        <button type="button" class="btn-close btn-sm tw-text-black" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm tw-bg-[#6c757d]"
                            data-bs-dismiss="modal">Close</button>
                        <a href="{{ route('admin.kriteria-penilaian.delete', $data->id) }}"
                            class="btn btn-danger btn-sm tw-bg-[#dc3545]">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- tutup modal --}}
    </div>
@endsection
