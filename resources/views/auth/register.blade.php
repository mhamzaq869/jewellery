@extends('layouts.app')
@section('body-color', 'bg-light')
@section('content')
    <div class="container py-12">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-7">{{ __('New Customers') }}</h6>

                        <form method="POST" method="{{ route('register') }}">
                            @csrf
                            <div class="row">

                                <div class="col-12">

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label class="visually-hidden" for="registerFirstName">
                                            First Name *
                                        </label>
                                        <input
                                            class="form-control form-control-sm @error('first_name') is-invalid @enderror"
                                            id="registerFirstName" type="text" name="first_name"
                                            value="{{ old('first_name') }}" autocomplete="name" autofocus
                                            placeholder="First Name *" required>
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-12">

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label class="visually-hidden" for="registerFirstName">
                                            First Name *
                                        </label>
                                        <input class="form-control form-control-sm @error('last_name') is-invalid @enderror"
                                            id="registerLastName" type="text" name="last_name"
                                            value="{{ old('last_name') }}" autocomplete="name" autofocus
                                            placeholder="Last Name *" required>
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-12">

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label class="visually-hidden" for="loginEmail">
                                            {{ __('Email Address *') }}
                                        </label>
                                        <input class="form-control form-control-sm @error('email') is-invalid @enderror"
                                            id="loginEmail" name="email" type="email" placeholder="Email Address *"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-12 col-md-6">

                                    <!-- Password -->
                                    <div class="form-group">
                                        <label class="visually-hidden" for="loginPassword">
                                            Password *
                                        </label>
                                        <input class="form-control form-control-sm  @error('password') is-invalid @enderror"
                                            id="loginPassword" type="password" name="password" placeholder="Password *"
                                            required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-12 col-md-6">

                                    <!-- Password -->

                                    <div class="form-group">
                                        <label class="visually-hidden" for="registerPasswordConfirm">
                                            Confirm Password *
                                        </label>
                                        <input
                                            class="form-control form-control-sm  @error('password_confirmation') is-invalid @enderror"
                                            id="registerPasswordConfirm" type="password" name="password_confirmation"
                                            placeholder="Confirm Password *" required autocomplete="current-password">

                                    </div>
                                </div>
                                <div class="col-12 col-md-auto">

                                    <!-- Link -->
                                    <div class="form-group fs-sm text-muted">
                                        By registering your details, you agree with our Terms & Conditions,
                                        and Privacy and Cookie Policy.
                                        Do you already have an account? <u><a
                                                href="{{ route('login') }}">{{ __('Sign in') }}</a></u>
                                    </div>

                                </div>
                                <div class="col-12 col-md">

                                    <!-- Newsletter -->
                                    {{-- <div class="form-group">
                                  <div class="form-check">
                                    <input class="form-check-input" id="registerNewsletter" type="checkbox">
                                    <label class="form-check-label" for="registerNewsletter">
                                      Sign me up for the Newsletter!
                                    </label>
                                  </div>
                                </div> --}}

                                </div>

                                <div class="col-12">

                                    <!-- Button -->
                                    <button class="btn btn-sm btn-dark" type="submit">
                                        Register
                                    </button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
