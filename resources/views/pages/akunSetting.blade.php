@if ($role == 'SPV')
    <x-navbar-spv />
@elseif ($role == 'ADMIN')
    <x-navbar-admin />
@endif
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-light pb-0" role="alert">
        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> Edit Akun </li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body px-5">
            <form class="justify-content-between row" action="{{ route('update-akun') }}" method="POST">
                @csrf
                <div class="col-md">
                    <div class="row">
                        <div class="row col-md-6 mb-3 me-2">
                            <label for="nama" class="col-md-3 form-label pt-2 ps-0">Email</label>
                            <input type="email" class="col-md form-control" id="nama" name="email" value="{{ $data->email }}" required />
                        </div>
                        <div class="row col-md-6 mb-3 me-2">
                            <label for="oldPw" class="col-md-3 form-label pt-2 ps-0">Old Password</label>
                            <input type="password" class="col-md form-control" id="oldPw" name="oldPassword" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="row col-md-6 mb-3 me-2"></div>
                        <div class="row col-md-6 mb-3 me-2">
                            <label for="newPw" class="col-md-3 form-label pt-2 ps-0">New Password</label>
                            <input type="password" class="col-md form-control" id="newPw" name="newPassword"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row col-md-6 mb-3 me-2"></div>
                        <div class="row col-md-6 mb-3 me-2">
                            <label for="confirmPw" class="col-md-3 form-label pt-2 ps-0">Confirm Password</label>
                            <input type="password" class="col-md form-control" id="confirmPw" name="confirmPassword"/>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end pe-0 me-0">
                        <a class="btn btn-primary btn-sm w-auto px-3 me-2" data-bs-toggle="modal" href="#exampleModal" role="button">Simpan</a>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin mengubah data akun?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary tw-bg-gray-500 btn-sm" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary tw-bg-blue-600 btn-sm">Simpan perubahan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection