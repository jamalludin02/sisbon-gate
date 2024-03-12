@extends('layouts.app')

@section('content')
    <div class="tw-bg-[#BC63FF] tw-h-screen tw-py-20">
        <div class="container ">
            <div class="card tw-p-10">
                <div class="row">
                    <div class="col-md-6 tw-border-r-2">
                        <img class="tw-rounded-3xl tw-w-full"  src="{{ asset('assets/images/login-img.png') }}" alt="">
                    </div>
                    <div class="col-md-6 tw-border-l-2 p-5">
                        <p class="tw-text-3xl tw-text-center">SILAHKAN LOGIN</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group tw-mb-4">
                                <label for="email" class="tw-label">Email Address</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group tw-mt-4">
                                <label for="exampleInputPassword1">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit"
                                class="btn border tw-bg-[#BC63FF] tw-text-white hover:tw-text-[#BC63FF] hover:tw-bg[#BC63FF] hover:tw-border-1 hover:tw-border-[#BC63FF] tw-w-full tw-mt-10">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
            <div class="col-md-6 offset-md-3">
                <form>
                    <div class="form-group mb-4">
                        <label for="name" class="tw-label">Name</label>
                        <input type="text" class="form-control tw-input" id="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group mb-4">
                        <label for="email" class="tw-label">Email Address</label>
                        <input type="email" class="form-control tw-input" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="tw-label">Password</label>
                        <input type="password" class="form-control tw-input" id="password"
                            placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
            </div>
        </div> --}}
        </div>
    </div>





    {{-- <div class=" tw-bg-blue-500 tw-h-screen">
        <div class="container w-100 h-100">
            <div class="row justify-content-center tw-my-auto">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn  btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
@endsection
