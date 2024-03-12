<x-navbar-admin />
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="alert alert-light pb-0" role="alert">
            <nav aria-label="breadcrumb m-0 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.akun') }}">Akun</a></li>
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
                <form class="justify-content-between row" action="{{ route('admin.akun.update', $data->id) }}"
                    method="POST">
                    @csrf
                    <div class="col-md">
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="pegawai" class="col-md-3 form-label align-middle pt-2 ps-0">Pegawai</label>
                                <select class="col-md form-select" aria-label="Default select example" id="pegawai"
                                    name="pegawai_id" required>
                                    <option disabled value="">Pilih Pegawai</option>
                                    @foreach ($pegawai as $item)
                                        <option {{ $data->pegawai_id == $item->id ? 'selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach


                                </select>
                                {{-- <label for="nama" class="col-md-3 form-label pt-2 ps-0">Nama</label>
                                <input type="text" class="col-md form-control" id="nama" name="nama"
                                    value="{{ $data->nama }}" required /> --}}
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="username" class="col-md-3 form-label align-middle pt-2 ps-0">Username</label>
                                <input type="text" class="col-md form-control" id="username" name="username"
                                    value="{{ $data->username }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="role" class="col-md-3 form-label align-middle pt-2 ps-0">Role</label>
                                <select class="col-md form-select" aria-label="Default select example" id="role"
                                    name="role" required>
                                    <option disabled value="">Pilih Role Akun</option>
                                    <option disabled {{ $data->role == 'ADMIN' ? 'selected' : '' }} value="SPV">Admin
                                    </option>
                                    <option {{ $data->role == 'SPV' ? 'selected' : '' }} value="SPV">Supervisor</option>
                                    <option {{ $data->role == 'GUEST' ? 'selected' : '' }} value="GUEST">Tamu</option>
                                </select>
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="email" class="col-md-3 form-label align-middle pt-2 ps-0">Email</label>
                                <input type="email" class="col-md form-control" id="email" name="email"
                                    value="{{ $data->email }}" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end pe-0 me-0">
                            <a href="{{ route('admin.akun') }}" class="btn btn-secondary btn-sm w-auto px-3 me-2"
                                role="button">Kembali</a>
                            <a class="btn btn-danger btn-sm w-auto px-3 me-2" data-bs-toggle="modal" href="#exampleModal"
                                role="button" >Hapus</a>
                            <a href="{{ route('admin.akun.reset-password', $data->id) }}" class="btn btn-warning btn-sm w-auto px-3 me-2" >Reset Password</a>
                            <button type="submit"
                                class="btn btn-primary btn-sm w-auto px-3 tw-bg-[#007bff]">Simpan</button>
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
                        <a href="{{ route('admin.akun.delete', $data->id) }}"
                            class="btn btn-danger btn-sm tw-bg-[#dc3545]">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- tutup modal --}}
    </div>
@endsection
