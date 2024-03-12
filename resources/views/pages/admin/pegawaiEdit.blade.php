<x-navbar-admin />
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="alert alert-light pb-0" role="alert">
            <nav aria-label="breadcrumb m-0 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.pegawai') }}">Pegawai</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    <li class="breadcrumb-item active" aria-current="page" v-if="id">{{ $data->id }}</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 p-0 ">Edit Data </h5>
            </div>
            <div class="card-body px-5">
                <form class="justify-content-between row" action="{{ route('admin.pegawai.update', $data->id) }}"
                    method="POST">
                    @csrf
                    <div class="col-md">
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="nama" class="col-md-3 form-label pt-2 ps-0">Nama</label>
                                <input type="text" class="col-md form-control" id="nama" name="nama"
                                    value="{{ $data->nama }}" required />
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="nip" class="col-md-3 form-label align-middle pt-2 ps-0">Nip</label>
                                <input type="text" class="col-md form-control" id="nip" name="nip"
                                    value="{{ $data->nip }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="tglLahir" class="col-md-3 form-label pt-2 ps-0">Tanggal lahir</label>
                                <input type="date" class="col-md form-control" id="tglLahir" name="tgl_lahir"
                                    value="{{ $data->tgl_lahir }}" required>
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="pendidikan"
                                    class="col-md-3 form-label align-middle pt-2 ps-0">Pendidikan</label>
                                <select class="col-md form-select" aria-label="Default select example" name="pendidikan"
                                    required>
                                    <option disabled value="">Pilih Pendidikan</option>
                                    <option {{ $data->pendidikan == 'SMA/SMK' ? 'selected' : '' }} value="SMA/SMK">
                                        {{ $data->pendidikan }}</option>
                                    <option {{ $data->pendidikan == 'D3' ? 'selected' : '' }} value="D3">D3</option>
                                    <option {{ $data->pendidikan == 'S1' ? 'selected' : '' }} value="S1">S1</option>
                                    <option {{ $data->pendidikan == 'S2' ? 'selected' : '' }} value="S2">S2</option>
                                    <option {{ $data->pendidikan == 'S3' ? 'selected' : '' }} value="S3">S3</option>


                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="nama" class="col-md-3 form-label pt-2 ps-0">Gender</label>
                                <div class="col-md">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="L" id="laki"
                                            name="gender" @if ($data->gender == 'L') checked @endif required>
                                        <label class="form-check-label" for="laki">
                                            Laki - laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="P" id="perempuan"
                                            name="gender" @if ($data->gender == 'P') checked @endif required>
                                        <label class="form-check-label" for="perempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="alamat" class="col-md-3 form-label align-middle pt-2 ps-0">Alamat</label>
                                <div class="col-md form-floating px-0">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="alamat" name="alamat" style="height: 85px"
                                        required>{{ $data->alamat }}</textarea>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="jabatan" class="col-md-3 form-label align-middle pt-2 ps-0">Jabatan</label>
                                <select class="col-md form-select" aria-label="Default select example" id="jabatan"
                                    name="jabatan_id" required>
                                    <option disabled value="">Pilih Jabatan</option>
                                    @foreach ($jabatan as $item)
                                        <option {{ $data->jabatan_id == $item->id ? 'selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->jabatan }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="no_telp" class="col-md-3 form-label align-middle pt-2 ps-0">No Telp</label>
                                <input type="text" class="col-md form-control" id="no_telp"
                                    value="{{ $data->no_telp }}" name="no_telp" required>


                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="nama" class="col-md-3 form-label pt-2 ps-0">Status</label>
                                <select class="col-md form-select" aria-label="Default select example" name="status"
                                    required>
                                    <option disabled value="">Pilih Status</option>
                                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Tidak aktif</option>
                                </select>
                            </div>
                            <div class="row col-md input-group-sm mb-3">

                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end pe-0 me-0">
                        <a class="btn btn-secondary btn-sm w-auto px-3 me-2" role="button"
                            onclick="btnBack()">Kembali</a>
                        <a class="btn btn-danger btn-sm w-auto px-3 me-2" data-bs-toggle="modal" href="#exampleModal"
                            role="button" v-if="id">Hapus</a>
                        <button type="submit" class="btn btn-primary btn-sm w-auto px-3 tw-bg-[#007bff]">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                        <a href="{{ route('admin.pegawai.delete', $data->id) }}"
                            class="btn btn-danger btn-sm tw-bg-[#dc3545]">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- tutup modal --}}
    </div>
@endsection
