@extends('user.layouts.app')

@section('usercontent')
    <!-- Form -->
    <form method="POST" action="{{route('profile.update',[$user->id])}}">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-12 col-md-6">

            <!-- Email -->
            <div class="form-group">
              <label class="form-label" for="accountFirstName">
                First Name *
              </label>
              <input class="form-control form-control-sm" id="accountFirstName" name="first_name" type="text" placeholder="First Name *" value="{{$user->first_name}}" required>
            </div>

          </div>
          <div class="col-12 col-md-6">

            <!-- Email -->
            <div class="form-group">
              <label class="form-label" for="accountLastName">
                Last Name *
              </label>
              <input class="form-control form-control-sm" id="accountLastName" name="last_name" type="text" placeholder="Last Name *" value="{{$user->last_name}}" required>
            </div>

          </div>
          <div class="col-12">

            <!-- Email -->
            <div class="form-group">
              <label class="form-label" for="accountEmail">
                Email Address *
              </label>
              <input class="form-control form-control-sm" id="accountEmail" type="email" name="email" placeholder="Email Address *" value="{{$user->email}}" required>
            </div>

          </div>
          <div class="col-12 col-md-6">

            <!-- Password -->
            <div class="form-group">
              <label class="form-label" for="accountPassword">
                Current Password
              </label>
              <input class="form-control form-control-sm @error('password') is-invalid @enderror" id="accountPassword" type="password" name="password" placeholder="Current Password">
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
              <label class="form-label" for="AccountNewPassword">
                New Password
              </label>
              <input class="form-control form-control-sm" id="AccountNewPassword" type="password" name="new_password" placeholder="New Password">
            </div>

          </div>

          <div class="col-12 col-lg-6">

            <!-- Birthday -->
            <div class="form-group">

              <!-- Label -->
              <label class="form-label">Date of Birth</label>

              <input class="form-control form-control-sm" id="accountLastName" name="date_of_birth" type="date" value="{{$user->date_of_birth}}" required>


            </div>

          </div>
          <div class="col-12 col-lg-6">

            <!-- Gender -->
            <div class="form-group mb-8">

              <!-- Label -->
              <label class="form-label">Gender</label>

              <!-- Inputs -->
              <div>

                <!-- Male -->
                <input class="btn-check" type="radio" name="gender" id="male" value="male" {{$user->gender == 'male' ? 'checked' : ''}}>
                <label class="btn btn-sm btn-outline-border" for="male" >Male</label>

                <!-- Female -->
                <input class="btn-check" type="radio" name="gender" id="female" value="female" {{$user->gender == 'female' ? 'checked' : ''}}>
                <label class="btn btn-sm btn-outline-border" for="female" >Female</label>

              </div>

            </div>

          </div>
          <div class="col-12">

            <!-- Button -->
            <button class="btn btn-dark" type="submit">Save Changes</button>

          </div>
        </div>
      </form>
@endsection

@push('script')
    {{-- @include('scripts.frontend.cart') --}}
@endpush
