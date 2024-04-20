<div>


    <nav class="navbar shadow tw-h-16">
        <div class="container tw-flex">
            <a class="navbar-brand tw-flex" href="#">
                <img class="align-middle tw-bg-white" width="40" src="{{ asset('assets/images/logo-white.png') }}"
                    alt="">
            </a>
            <div class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
  
                <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm px-4">Login</a>
            </div>
        </div>
    </nav>
  </div>
  

  

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    {{ __('HALAMAN TAMU') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
