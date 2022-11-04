@extends('layouts.app')
@section('body-color', 'bg-light')
@section('content')
    <div class="container py-12">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-7">{{ __('Login') }}</h6>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
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
                                <div class="col-12">

                                    <!-- Password -->
                                    <div class="form-group">
                                        <label class="visually-hidden" for="loginPassword">
                                            Password *
                                        </label>
                                        <input class="form-control form-control-sm  @error('password') is-invalid @enderror"
                                            id="loginPassword" type="password" name="password" placeholder="Password *" required
                                            autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-12 col-md">

                                    <!-- Remember -->
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" name="remember" id="remember" type="checkbox"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="loginRemember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-auto">

                                    <!-- Link -->
                                    <div class="form-group">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>

                                </div>

                                <div class="col-12 col-md-auto">

                                    <!-- Link -->
                                    <div class="form-group fs-sm text-muted">
                                      If you do not have an account <u><a href="{{route('register')}}">{{__('Create New Account')}}</a></u>
                                    </div>

                                  </div>
                                <div class="col-12">

                                    <!-- Button -->
                                    <button class="btn btn-sm btn-dark" type="submit">
                                        Sign In
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
