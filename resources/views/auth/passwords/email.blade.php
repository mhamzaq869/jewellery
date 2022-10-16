@extends('layouts.app')
@section('body-color', 'bg-light')
@section('content')

<div class="container py-12">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-7">{{ __('Reset Password') }}</h6>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                                <!-- Email -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>

                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
