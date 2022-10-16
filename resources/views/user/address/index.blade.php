@extends('user.layouts.app')

@section('usercontent')
<div class="row">
    @foreach ($addresses as $address)
    <div class="col-12 col-lg-6" id="address_{{$address->id}}">

      <!-- Card -->
      <div class="card card-lg bg-light mb-8">
        <div class="card-body">

          <!-- Heading -->
          <h6 class="mb-6">
            @if ($address->is_delivery == 1 && $address->is_shipping == 1)
                Billing & Shipping Address
            @elseif($address->is_shipping)
                Shipping Address
            @elseif($address->is_delivery)
                Billing Address
            @endif
          </h6>

          <!-- Text -->
          <p class="text-muted mb-0">
            {{$address->first_name}}  {{$address->last_name}} <br>
            {{$address->address_1}} <br>
            {{$address->address_2}} <br>
            {{$address->zipcode}} <br>
            {{$address->country}} <br>
            {{$address->phone}}
          </p>

          <!-- Action -->
          <div class="card-action card-action-end">

            <!-- Button -->
            <a class="btn btn-xs btn-circle btn-white-primary" href="{{route('address.edit',[$address->id])}}">
              <i class="fe fe-edit-2"></i>
            </a>

            <!-- Button -->
            <button class="btn btn-xs btn-circle btn-white-primary" onclick="removeAddress({{$address->id}})">
              <i class="fe fe-x"></i>
            </button>

          </div>

        </div>
      </div>

    </div>
    @endforeach

    <div class="col-12">

      <!-- Button -->
      <a class="btn w-100 btn-lg btn-outline-border" href="{{route('address.create')}}">
        Add Address <i class="fe fe-plus"></i>
      </a>

    </div>
  </div>
@endsection

@push('script')
    @include('scripts.user.addressjs')
@endpush
