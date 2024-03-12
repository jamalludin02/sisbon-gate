<x-navbar-admin />
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="alert alert-light pb-0" role="alert">
            <nav aria-label="breadcrumb m-0 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.pegawai') }}">Pegawai</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 p-0 ">Edit Data </h5>
            </div>
            <div class="card-body px-5">
                <form class="justify-content-between row" action="{{ route('admin.pegawai.created') }}" method="POST">
                    @csrf
                    <div class="col-md">
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="nama" class="col-md-3 form-label pt-2 ps-0">Nama</label>
                                <input type="text" class="col-md form-control" id="nama" name="nama" required />
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="nip" class="col-md-3 form-label align-middle pt-2 ps-0">Nip</label>
                                <input type="text" class="col-md form-control" id="nip" name="nip" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="tglLahir" class="col-md-3 form-label pt-2 ps-0">Tanggal lahir</label>
                                <input type="date" class="col-md form-control" id="tglLahir" name="tgl_lahir" required>
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="pendidikan"
                                    class="col-md-3 form-label align-middle pt-2 ps-0">Pendidikan</label>
                                <select class="col-md form-select" aria-label="Default select example" name="pendidikan"
                                    required>
                                    <option disabled selected value="">Pilih Pendidikan</option>
                                    <option value="SMA/SMK"></option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>


                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="nama" class="col-md-3 form-label pt-2 ps-0">Gender</label>
                                <div class="col-md">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="L" id="laki"
                                            name="gender" required>
                                        <label class="form-check-label" for="laki">
                                            Laki - laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="P" id="perempuan"
                                            name="gender" required>
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
                                        required></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="jabatan" class="col-md-3 form-label align-middle pt-2 ps-0">Jabatan</label>
                                <select class="col-md form-select" aria-label="Default select example" id="jabatan"
                                    name="jabatan_id" required>
                                    <option disabled selected value="">Pilih Jabatan</option>
                                    @foreach ($jabatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->jabatan }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="no_telp" class="col-md-3 form-label align-middle pt-2 ps-0">No Telp</label>
                                <input type="text" class="col-md form-control" id="no_telp" name="no_telp" required>


                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="nama" class="col-md-3 form-label pt-2 ps-0">Status</label>
                                <select class="col-md form-select" aria-label="Default select example" name="status"
                                    required>
                                    <option disabled selected value="">Pilih Status</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak aktif</option>
                                </select>
                            </div>
                            <div class="row col-md input-group-sm mb-3">

                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end pe-0 me-0">
                        <button type="submit" class="btn btn-primary btn-sm w-auto px-3 tw-bg-[#007bff]">Simpan</button>
                    </div>
                    <!-- modal... -->
                </form>
            </div>
        </div>
    </div>
@endsection
