@extends('backend.layouts.app')

@section('title', 'User')
@section('home_url', route('user.index'))
@section('page', 'Create')

@section('content')

    <div class="content-body">
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('user.store') }}">
                                @csrf
                                <div class="row">

                                    <div class="col-6">

                                        <!-- Email -->
                                        <div class="mb-1">
                                            <label class="form-lable" for="registerFirstName">
                                                First Name *
                                            </label>
                                            <input
                                                class="form-control @error('first_name') is-invalid @enderror"
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
                                    <div class="col-6">

                                        <!-- Email -->
                                        <div class="mb-1">
                                            <label class="form-lable" for="registerFirstName">
                                                First Name *
                                            </label>
                                            <input class="form-control @error('last_name') is-invalid @enderror"
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
                                    <div class="col-6">

                                        <!-- Email -->
                                        <div class="mb-1">
                                            <label class="form-lable" for="loginEmail">
                                                {{ __('Email Address *') }}
                                            </label>
                                            <input class="form-control @error('email') is-invalid @enderror"
                                                id="loginEmail" name="email" type="email" placeholder="Email Address *"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Gender *</label>
                                            <select name="gender" class="select2 form-select" required>
                                                <option value="male" selected>Male</option>
                                                <option value="female" >Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6">

                                        <!-- Password -->
                                        <div class="mb-1">
                                            <label class="form-lable" for="loginPassword">
                                                Password *
                                            </label>
                                            <input class="form-control  @error('password') is-invalid @enderror"
                                                id="loginPassword" type="password" name="password" placeholder="Password *"
                                                required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-6 col-md-6">

                                        <!-- Password -->

                                        <div class="mb-1">
                                            <label class="form-lable" for="registerPasswordConfirm">
                                                Confirm Password *
                                            </label>
                                            <input
                                                class="form-control  @error('password_confirmation') is-invalid @enderror"
                                                id="registerPasswordConfirm" type="password" name="password_confirmation"
                                                placeholder="Confirm Password *" required autocomplete="current-password">

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Date Of Birth</label>
                                            <input class="form-control @error('date_of_birth') is-invalid @enderror"
                                                type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                                                placeholder="date_of_birth *" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Status</label>
                                            <select name="status" id="status" class="select2 form-select">
                                                <option value="1" selected>Active</option>
                                                <option value="0" >Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
