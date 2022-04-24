@extends('layouts.app')

@section('title')
    {{ 'Sign Up to RealEstate Nepal | ' }}{{ config('app.name') }}
@endsection

@section('content')
    <div class="register-container d-flex align-items-center justify-content-center">
        <div class="container d-flex align-items-center justify-content center">
            <div class="card register-form-card">
                <div class="row m-0">
                    <div class="col-12 col-md-12 col-lg-5 register-form">
                        <div class="form-title semi-bold mb-3 condensed-4">
                            Create a Account
                            <p class="text-muted regular">Create a Free Account and Start Lisitng</p>
                        </div>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                {{-- START: First, Middle, and Last Name --}}
                                <div class="row m-0 mb-3">
                                    {{-- First Name --}}
                                    <div class="col-12 col-md-12 col-lg-4 p-0 pe-2">
                                        <div class="form-group">
                                            <label for="firstName" class="medium mb-1">First Name <span
                                                    class="text-dark-red">*</span></label>

                                            <input id="firstName" type="text"
                                                class="form-control @error('firstName') is-invalid @enderror"
                                                name="firstName" value="{{ old('firstName') }}" required
                                                autocomplete="name" autofocus>

                                            {{-- Displays the error in First Name --}}
                                            @error('firstName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Middle Name --}}
                                    <div class="col-12 col-md-12 col-lg-4 p-0 px-2">
                                        <div class="form-group">
                                            <label for="middleName" class="medium mb-1">Middle Name</label>

                                            <input id="middleName" type="text"
                                                class="form-control @error('middleName') is-invalid @enderror"
                                                name="middleName" value="{{ old('middleName') }}"
                                                autocomplete="middleName" autofocus>

                                            {{-- Displays the error in First Name --}}
                                            @error('middleName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Last Name --}}
                                    <div class="col-12 col-md-12 col-lg-4 p-0 ps-2">
                                        <div class="form-group">
                                            <label for="lastName" class="medium mb-1">Last Name <span
                                                    class="text-dark-red">*</span></label>

                                            <input id="lastName" type="text"
                                                class="form-control @error('lastName') is-invalid @enderror" name="lastName"
                                                value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                                            {{-- Displays the error in Last Name --}}
                                            @error('lastName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="form-group mb-3">
                                    <label for="email" class="medium mb-1">Email <span
                                            class="text-dark-red">*</span></label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Phone number --}}
                                <div class="form-group mb-3">
                                    <label for="phoneNumber" class="medium mb-1">Phone Number</label>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="countryCode">+977</span>
                                        <input type="text" class="form-control @error('phoneNumber') is-invalid @enderror"
                                            name="phoneNumber" value="{{ old('phoneNumber') }}"
                                            autocomplete="phoneNumber">
                                    </div>

                                    @error('phoneNumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Password and Confirm Password --}}
                                <div class="row m-0 mb-3">
                                    {{-- Password --}}
                                    <div class="col-12 col-md-12 col-lg-6 p-0 pe-2">
                                        <div class="form-group">
                                            <label for="password" class="medium mb-1">Password <span
                                                    class="text-dark-red">*</span></label>

                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Confirm password --}}
                                    <div class="col-12 col-md-12 col-lg-6 p-0 ps-2">
                                        <div class="form-group">
                                            <label for="password-confirm" class="medium mb-1">Confirm Password</label>

                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>

                                {{-- T&C --}}
                                <div class="form-group mb-3">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="TC">
                                        <label class="form-check-label regular" for="flexCheckDefault">
                                            I agree to the <span class="medium">Terms and Conditions.</span>
                                        </label>
                                    </div>
                                    <p class="regular">By selecting the check box and clicking the <span
                                            class="medium">Sign Up Button</span>, you agree to <span
                                            class="medium">RealEstate Nepal's Terms & Conditions</span></p>
                                </div>

                                {{-- Submit button --}}
                                <div class="form-group w-100 mb-0">
                                    <button type="submit" class="btn btn-custom-success semi-bold w-100 mb-2">
                                        Sign Up
                                    </button>

                                    {{-- <a href="#" class="btn btn-custom-theme-blue medium w-100 mb-2">
                                        <i class="bi bi-facebook"></i> <span>Sign Up using Facebook</span>
                                    </a> --}}
                                    <a href="{{ route('login') }}" class="mt-2 btn btn-link">Already have an account?</a>
                                </div>
                            </form>
                    </div>
                    <div
                        class="col-12 col-md-12 col-lg-7 register-form-info d-flex align-items-center justify-content-center">
                        <div class="register-message">
                            <h3 class="thin text-center">Welcome to RealEstate Nepal</h3>
                            <div>
                                <p class="light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci
                                    ipsam quae deleniti natus nihil consequuntur veniam vel excepturi quia eaque non,
                                    consectetur possimus ullam, sed quibusdam tempore quod aliquid? Magnam dolorum, id
                                    incidunt
                                    alias repellendus recusandae doloribus nemo animi velit voluptatem neque itaque sunt
                                    iste
                                    assumenda odit molestiae reiciendis corporis.</p>
                                <span class="mt-3 medium">Sign Up Today</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
