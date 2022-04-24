@extends('layouts.app')

@section('title')
    {{ 'Sign In to your Account | ' }}{{ config('app.name') }}
@endsection

@section('content')
    <div class="login-container d-flex align-items-center justify-content-center">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="card login-form-card">
                <div class="row m-0">
                    <div class="col-12 col-md-12 col-lg-4 login-form">
                        <div class="form-title semi-bold mb-3 condensed-4">Sign In to Your RealEstate Nepal Account</div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="email" class="regular mb-1">Email <span class="text-dark-red">*</span></label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="regular mb-1">Password <span
                                        class="text-dark-red">*</span></label>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-custom-success semi-bold w-100 mb-2">
                                    Sign In
                                </button>

                                {{-- <a href="#" class="btn btn-custom-theme-blue medium w-100 mb-2">
                                    <i class="bi bi-facebook"></i> <span>Sign In using Facebook</span>
                                </a> --}}

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}

                                <a href="{{ route('register') }}" class="btn btn-link">Don't Have an Account?</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-12 col-lg-8 login-form-info d-flex align-items-center justify-content-center">
                        <p class="login-message">
                            <span class="extra-light">Sign in to view the </span><span class="normal">Best
                                Properties</span><span class="extra-light"> around you!</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
