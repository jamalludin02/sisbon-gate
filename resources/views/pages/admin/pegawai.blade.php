<x-navbar-admin />
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="tw-bg-white tw-p-5 tw-rounded tw-mb-5 tw-min-h">
            <nav aria-label="breadcrumb m-0 p-0 tw-mx-auto ">
                <ol class="breadcrumb tw-text-black-500 tw-h-auto tw-mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            {{-- <div class="card-header">Manage Users</div> --}}
            <div class="card-body tw-overflow-auto">
                
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
