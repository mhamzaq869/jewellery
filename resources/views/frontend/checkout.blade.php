@extends('layouts.app')

@section('content')
<!-- Form -->
<form id="checkoutForm"  action="{{route('place.order')}}" method="POST">
    @csrf

    <input type="hidden" name="amount" value="{{$total}}">
    <input type="hidden" name="tax" value="{{number_format($carts->sum('tax'))}}">
    <input type="hidden" name="shippment" value="{{number_format($carts->sum('shipping'))}}">
    <input type="hidden" name="billing_id" value="{{$billing->id}}">
    <input type="hidden" name="shipping_id">

    <section class="pt-7 pb-12">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">

                    <!-- Heading -->
                    <h3 class="mb-4">Checkout</h3>

                    <!-- Subheading -->
                    {{-- <p class="mb-10">
                        Already have an account? <a class="fw-bold text-reset" href="{{rote()}}">Click here to login</a>
                    </p> --}}

                </div>
            </div>
            <div class="row">

                <div class="col-12 col-md-7">


                        <!-- Heading -->
                        <h6 class="mb-7">Billing Details</h6>

                        <!-- Billing details -->
                        <div class="row mb-9">
                            <div class="col-12 col-md-6">

                                <!-- First Name -->
                                <div class="form-group">
                                    <label class="form-label" for="checkoutBillingFirstName">First Name *</label>
                                    <input class="form-control form-control-sm" id="checkoutBillingFirstName" type="text"
                                        placeholder="First Name" name="bill[first_name]" value="{{$billing->first_name ?? ''}}" required>
                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Last Name -->
                                <div class="form-group">
                                    <label class="form-label" for="checkoutBillingLastName">Last Name *</label>
                                    <input class="form-control form-control-sm" id="checkoutBillingLastName" type="text"
                                        placeholder="Last Name" name="bill[last_name]" value="{{$billing->last_name ?? ''}}"  required>
                                </div>

                            </div>
                            <div class="col-12">

                                <!-- Email -->
                                <div class="form-group">
                                    <label class="form-label" for="checkoutBillingEmail">Email *</label>
                                    <input class="form-control form-control-sm" id="checkoutBillingEmail" type="email"
                                        placeholder="Email" name="bill[email]" value="{{$billing->email ?? ''}}" required>
                                </div>

                            </div>
                            <div class="col-12">

                                <!-- Company Name -->
                                <div class="form-group">
                                    <label class="form-label" for="checkoutBillingCompany">Company name *</label>
                                    <input class="form-control form-control-sm" name="bill[company]" value="{{$billing->company ?? ''}}" id="checkoutBillingCompany" type="text"
                                        placeholder="Company name (optional)">
                                </div>

                            </div>
                            <div class="col-12">

                                <!-- Country -->
                                <div class="form-group">
                                    <label class="form-label" for="checkoutBillingCountry">Country *</label>
                                    <input class="form-control form-control-sm" name="bill[country]" value="{{$billing->country ?? ''}}" id="checkoutBillingCountry" type="text"
                                        placeholder="Country" required>
                                </div>

                            </div>
                            <div class="col-12">

                                <!-- Address Line 1 -->
                                <div class="form-group">
                                    <label class="form-label" for="checkoutBillingAddress">Address Line 1 *</label>
                                    <input class="form-control form-control-sm" name="bill[address_1]" value="{{$billing->address_1 ?? ''}}" id="checkoutBillingAddress" type="text"
                                        placeholder="Address Line 1" required>
                                </div>

                            </div>
                            <div class="col-12">

                                <!-- Address Line 2 -->
                                <div class="form-group">
                                    <label class="form-label" for="checkoutBillingAddressTwo">Address Line 2</label>
                                    <input class="form-control form-control-sm" name="bill[address_2]" value="{{$billing->address_2 ?? ''}}" id="checkoutBillingAddressTwo"
                                        type="text" placeholder="Address Line 2 (optional)">
                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Town / City -->
                                <div class="form-group">
                                    <label class="form-label" for="checkoutBillingTown">Town / City *</label>
                                    <input class="form-control form-control-sm" name="bill[city]" value="{{$billing->city ?? ''}}" id="checkoutBillingTown" type="text"
                                        placeholder="Town / City" required>
                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- ZIP / Postcode -->
                                <div class="form-group">
                                    <label class="form-label" for="checkoutBillingZIP">ZIP / Postcode *</label>
                                    <input class="form-control form-control-sm" name="bill[zipcode]" value="{{$billing->zipcode ?? ''}}" id="checkoutBillingZIP" type="text"
                                        placeholder="ZIP / Postcode" required>
                                </div>

                            </div>
                            <div class="col-12">

                                <!-- Mobile Phone -->
                                <div class="form-group mb-0">
                                    <label class="form-label" for="checkoutBillingPhone">Mobile Phone *</label>
                                    <input class="form-control form-control-sm" name="bill[phone]" value="{{$billing->phone ?? ''}}" id="checkoutBillingPhone" type="tel"
                                        placeholder="Mobile Phone" required>
                                </div>

                            </div>
                        </div>

                        <!-- Heading -->
                        <h6 class="mb-7">Shipping Details</h6>

                        <!-- Shipping details -->
                        {{-- <div class="table-responsive mb-6">
                            <table class="table table-bordered table-sm table-hover mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check custom-radio">
                                                <input class="form-check-input" id="checkoutShippingStandard" name="shipping" type="radio">
                                                <label class="form-check-label text-body text-nowrap"
                                                    for="checkoutShippingStandard">
                                                    Standard Shipping
                                                </label>
                                            </div>
                                        </td>
                                        <td>Delivery in 5 - 7 working days</td>
                                        <td>$8.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check custom-radio">
                                                <input class="form-check-input" id="checkoutShippingExpress"
                                                    name="shipping" type="radio">
                                                <label class="form-check-label text-body text-nowrap"
                                                    for="checkoutShippingExpress">
                                                    Express Shipping
                                                </label>
                                            </div>
                                        </td>
                                        <td>Delivery in 3 - 5 working days</td>
                                        <td>$12.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check custom-radio">
                                                <input class="form-check-input" id="checkoutShippingShort"
                                                    name="shipping" type="radio">
                                                <label class="form-check-label text-body text-nowrap"
                                                    for="checkoutShippingShort">
                                                    1 - 2 Shipping
                                                </label>
                                            </div>
                                        </td>
                                        <td>Delivery in 1 - 2 working days</td>
                                        <td>$18.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check custom-radio">
                                                <input class="form-check-input" id="checkoutShippingFree" name="shipping"
                                                    type="radio">
                                                <label class="form-check-label text-body text-nowrap"
                                                    for="checkoutShippingFree">
                                                    Free Shipping
                                                </label>
                                            </div>
                                        </td>
                                        <td>Living won't the He one every subdue
                                            meat replenish face was you morning
                                            firmament darkness.</td>
                                        <td>$0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}

                        <!-- Address -->
                        <div class="mb-9">

                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" id="checkoutShippingAddress" type="checkbox">
                                <label class="form-check-label fs-sm" data-bs-toggle="collapse"
                                    data-bs-target="#checkoutShippingAddressCollapse" for="checkoutShippingAddress">
                                    Ship to a different address?
                                </label>
                            </div>

                            <!-- Collapse -->
                            <div class="collapse" id="checkoutShippingAddressCollapse">
                                <div class="row mt-6">
                                    <div class="col-12">
                                        <!-- Country -->
                                        <div class="form-group">
                                            <label class="form-label" for="checkoutShippingAddressCountry">Country
                                                *</label>
                                            <input class="form-control form-control-sm"
                                                id="checkoutShippingAddressCountry" name="ship[country]"  type="text" placeholder="Country">
                                        </div>

                                    </div>
                                    <div class="col-12">

                                        <!-- Address Line 1 -->
                                        <div class="form-group">
                                            <label class="form-label" for="checkoutShippingAddressLineOne">Address Line 1
                                                *</label>
                                            <input class="form-control form-control-sm"
                                                id="checkoutShippingAddressLineOne" name="ship[address_1]" type="text"
                                                placeholder="Address Line 1">
                                        </div>

                                    </div>
                                    <div class="col-12">

                                        <!-- Address Line 2 -->
                                        <div class="form-group">
                                            <label class="form-label" for="checkoutShippingAddressLineTwo">Address Line
                                                2</label>
                                            <input class="form-control form-control-sm"
                                                id="checkoutShippingAddressLineTwo" name="ship[address_2]" type="text"
                                                placeholder="Address Line 2 (optional)">
                                        </div>

                                    </div>
                                    <div class="col-6">

                                        <!-- Town / City -->
                                        <div class="form-group">
                                            <label class="form-label" for="checkoutShippingAddressTown">Town / City
                                                *</label>
                                            <input class="form-control form-control-sm" name="ship[city]" id="checkoutShippingAddressTown"
                                                type="text" placeholder="Town / City">
                                        </div>

                                    </div>
                                    <div class="col-6">

                                        <!-- Town / City -->
                                        <div class="form-group">
                                            <label class="form-label" for="checkoutShippingAddressZIP">ZIP / Postcode
                                                *</label>
                                            <input class="form-control form-control-sm" name="ship[zipcode]" id="checkoutShippingAddressZIP"
                                                type="text" placeholder="ZIP / Postcode">
                                        </div>

                                    </div>
                                    <div class="col-12">

                                        <!-- Button -->
                                        <button class="btn btn-sm btn-outline-dark" type="button" id="saveShipAddress">
                                            Save Address
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>


                        <!-- Heading -->
                        <h6 class="mb-7">Payment</h6>

                        <!-- List group -->
                        <div class="list-group list-group-sm mb-7">

                            @foreach ($integerations as $integrate)
                            <div class="list-group-item">

                                <!-- Radio -->
                                <div class="form-check custom-radio">

                                    <!-- Input -->
                                    <input class="form-check-input payment" id="checkoutPayment{{$integrate->name}}" name="payment"
                                        type="radio" data-collapse="hide" value="{{$integrate->name}}" data-target="#checkoutPaymentCardCollapse" required>

                                    <!-- Label -->
                                    <label class="form-check-label fs-sm text-body text-nowrap" for="checkoutPayment{{$integrate->name}}">
                                        <img src="{{asset('/backend/app-assets/images/icons/'.$integrate->image)}}" width="40" alt="...">
                                    </label>

                                </div>

                            </div>
                            @endforeach

                        </div>

                        <!-- Notes -->
                        <textarea class="form-control form-control-sm mb-9 mb-md-0 fs-xs" rows="5"
                            placeholder="Order Notes (optional)" name="note"></textarea>



                </div>
                <div class="col-12 col-md-5 col-lg-4 offset-lg-1">

                    <!-- Heading -->
                    <h6 class="mb-7">Order Items ({{$carts->count()}})</h6>

                    <!-- Divider -->
                    <hr class="my-7">

                    <!-- List group -->
                    <ul class="list-group list-group-lg list-group-flush-y list-group-flush-x mb-7">
                        @foreach ($carts as $cart)
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-4">

                                    <!-- Image -->
                                    <a href="{{route('product.detail',[$cart->product->slug])}}">
                                        <img src="{{asset($cart->product->photo)}}" alt="..." class="img-fluid">
                                    </a>

                                </div>
                                <div class="col">

                                    <!-- Title -->
                                    <p class="mb-4 fs-sm fw-bold">
                                        <a class="text-body" href="{{route('product.detail',[$cart->product->slug])}}">{{$cart->product->title}}</a> <br>
                                        <span class="text-muted">${{number_format($cart->price,2)}}</span>
                                    </p>

                                    <!-- Text -->
                                    <div class="fs-sm text-muted">
                                        Size: {{$cart->size}} <br>

                                    </div>

                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>

                    <!-- Card -->
                    <div class="card mb-9 bg-light">
                        <div class="card-body">
                            <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                                <li class="list-group-item d-flex">
                                    <span>Subtotal</span> <span class="ms-auto fs-sm">${{number_format($subtotal,2)}}</span>
                                </li>
                                <li class="list-group-item d-flex">
                                    <span>Tax</span> <span class="ms-auto fs-sm">${{number_format($carts->sum('tax'),2)}}</span>
                                </li>
                                <li class="list-group-item d-flex">
                                    <span>Shipping</span> <span class="ms-auto fs-sm">${{number_format($carts->sum('shipping'),2)}}</span>
                                </li>
                                <li class="list-group-item d-flex fs-lg fw-bold">
                                    <span>Total</span> <span class="ms-auto">${{number_format($total,2)}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Disclaimer -->
                    <p class="mb-7 fs-xs text-gray-500">
                        Your personal data will be used to process your order, support
                        your experience throughout this website, and for other purposes
                        described in our privacy policy.
                    </p>

                    <!-- Button -->
                    <button class="btn w-100 btn-dark placeorder">
                        Place Order
                    </button>

                </div>

            </div>
        </div>
    </section>
</form>
{{-- <div id="container"></div>

<script async
  src="https://pay.google.com/gp/p/js/pay.js"
  onload="onGooglePayLoaded()"></script>
    <!-- FEATURES --> --}}
    @include('layouts.feature')
@endsection

@push('script')
    @include('scripts.frontend.checkout')
@endpush
