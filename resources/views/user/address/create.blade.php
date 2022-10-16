@extends('user.layouts.app')

@section('usercontent')
    <!-- Heading -->
    <h6 class="mb-7">
        Add Address
      </h6>

      <!-- Form -->
      <form action="{{route('address.store')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label class="form-label" for="firstName">First Name *</label>
              <input class="form-control" id="firstName" name="first_name" type="text" placeholder="First Name" required>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label class="form-label" for="lastName">Last Name *</label>
              <input class="form-control" id="lastName" name="last_name" type="text" placeholder="Last Name" required>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label class="form-label" for="emailAddress">Email Address *</label>
              <input class="form-control" id="emailAddress" name="email" type="email" placeholder="Email Address" required>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label class="form-label" for="companyName">Company Name</label>
              <input class="form-control" id="companyName" name="company" type="text" placeholder="Company Name" required>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label class="form-label" for="country">Country *</label>
              <input class="form-control" id="country" name="country" type="text" placeholder="Country" required>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label class="form-label" for="addressLineOne">Address Line 1 *</label>
              <input class="form-control" id="addressLineOne" name="address_1" type="text" placeholder="Address Line 1" required>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label class="form-label" for="addressLineTwo">Address Line 2</label>
              <input class="form-control" id="addressLineTwo" name="address_2" type="text" placeholder="Address Line 2" required>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label class="form-label" for="townCity">Town / City *</label>
              <input class="form-control" id="townCity" name="city" type="text" placeholder="Town / City" required>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label class="form-label" for="zipPostcode">ZIP / Postcode *</label>
              <input class="form-control" id="zipPostcode" name="zipcode" type="text" placeholder="ZIP / Postcode" required>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label class="form-label" for="mobilePhone">Mobile Phone *</label>
              <input class="form-control" id="mobilePhone" name="phone" type="tel" placeholder="Mobile Phone" required>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input"  name="is_delivery" value="1" id="defaultDeliveryAddress">
                <label class="form-check-label" for="defaultDeliveryAddress">Default delivery address</label>
              </div>
              <div class="form-check mb-0">
                <input type="checkbox" class="form-check-input" name="is_shipping" value="1" id="defaultShippingAddress">
                <label class="form-check-label" for="defaultShippingAddress">Default shipping address</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Button -->
        <button class="btn btn-dark" type="submit">
          Add Address
        </button>

      </form>
@endsection

@push('script')
    {{-- @include('scripts.frontend.cart') --}}
@endpush
