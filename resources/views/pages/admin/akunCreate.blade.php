<x-navbar-admin />
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="alert alert-light pb-0" role="alert">
            <nav aria-label="breadcrumb m-0 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.akun') }}">Akun</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 p-0 ">Tambah Data </h5>
            </div>
            <div class="card-body px-5">
                <form class="justify-content-between row" action="{{ route('admin.akun.created') }}" method="POST">
                    @csrf
                    <div class="col-md">
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="pegawai" class="col-md-3 form-label align-middle pt-2 ps-0">Pegawai</label>
                                <select class="col-md form-select" aria-label="Default select example" id="pegawai"
                                    name="pegawai_id" required>
                                    <option disabled selected value="">Pilih Pegawai</option>
                                    @foreach ($pegawai as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="username" class="col-md-3 form-label align-middle pt-2 ps-0">Username</label>
                                <input type="text" class="col-md form-control" id="username" name="username"
                                    value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row col-md mb-3 me-2">
                                <label for="role" class="col-md-3 form-label align-middle pt-2 ps-0">Role</label>
                                <select class="col-md form-select" aria-label="Default select example" id="role"
                                    name="role" required>
                                    <option disabled selected value="">Pilih Role Akun</option>
                                    <option disabled value="SPV">Admin
                                    </option>
                                    <option value="SPV">Supervisor</option>
                                    <option value="GUEST">Tamu</option>
                                </select>
                            </div>
                            <div class="row col-md input-group-sm mb-3">
                                <label for="email" class="col-md-3 form-label align-middle pt-2 ps-0">Email</label>
                                <input type="email" class="col-md form-control" id="email" name="email"
                                    value="" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end pe-0 me-0">
                            <a href="{{ route('admin.akun') }}" class="btn btn-secondary btn-sm w-auto px-3 me-2"
                                role="button">Kembali</a>
                            <button type="submit"
                                class="btn btn-primary btn-sm w-auto px-3 tw-bg-[#007bff]">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
