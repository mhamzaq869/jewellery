@extends('layouts.app')
@section('body-color', 'bg-light')
@section('content')
<div class="container py-12">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-7">{{ __('Reset Password') }}</h6>
                    <form method="POST" action="{{ route('password.update') }}">
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

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <label class="visually-hidden" for="loginPassword">
                                        {{ __('Confirm Password *') }}
                                    </label>
                                    <input class="form-control form-control-sm  @error('password') is-invalid @enderror"
                                        id="loginPassword" type="password" name="password_confirmation" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-12">

                                <!-- Button -->
                                <button class="btn btn-sm btn-dark" type="submit">
                                    {{ __('Reset Password') }}
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
