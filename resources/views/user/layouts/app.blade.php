@extends('layouts.app')

@section('content')
 <!-- CONTENT -->
 <section class="pt-7 pb-12">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">

          <!-- Heading -->
          <h3 class="mb-10">My Account</h3>

        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-3">
         @include('user.layouts.sidebar')
        </div>
        <div class="col-12 col-md-9 col-lg-8 offset-lg-1">
            @yield('usercontent')
        </div>
      </div>
    </div>
  </section>

@endsection

@push('script')
    {{-- @include('scripts.frontend.cart') --}}
@endpush
