@extends('layouts.app')

@section('content')
    <!-- CONTENT -->
    <section class="pt-7 pb-12">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Heading -->
                    <h3 class="mb-10 text-center">Shopping Cart</h3>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-7">

                    <!-- List group -->
                    <ul class="list-group list-group-lg list-group-flush-x mb-6 cart-append-page">

                        @foreach ($carts as $cart)
                        <li class="list-group-item" id="cart-{{$cart->id}}">
                            <div class="row align-items-center">
                                <div class="col-3">

                                    <!-- Image -->
                                    <a href="{{url('product',[$cart->product->slug])}}">
                                        <img class="img-fluid" src="{{asset($cart->product->photo)}}" alt="...">
                                    </a>

                                </div>
                                <div class="col">

                                    <!-- Title -->
                                    <div class="d-flex mb-2 fw-bold">
                                        <a class="text-body" href="#">{{$cart->product->title}}</a> <span
                                            class="ms-auto">${{number_format($cart->price,2)}}</span>
                                    </div>

                                    <!-- Text -->
                                    <p class="mb-7 fs-sm text-muted">
                                        Size: {{Str::ucfirst($cart->size)}}
                                    </p>

                                    <!--Footer -->
                                    <div class="d-flex align-items-center">

                                        <!-- Select -->
                                        <select class="form-select form-select-xxs w-auto" onchange="cartUpdateOnPage(this.value,{{$cart->id}})">
                                            <option value="1" {{$cart->quantity == 1 ? 'selected' : ''}}>1</option>
                                            <option value="2" {{$cart->quantity == 2 ? 'selected' : ''}}>2</option>
                                            <option value="3" {{$cart->quantity == 3 ? 'selected' : ''}}>3</option>
                                            <option value="4" {{$cart->quantity == 4 ? 'selected' : ''}}>4</option>
                                            <option value="5" {{$cart->quantity == 5 ? 'selected' : ''}}>5</option>
                                            <option value="6" {{$cart->quantity == 6 ? 'selected' : ''}}>6</option>
                                            <option value="7" {{$cart->quantity == 7 ? 'selected' : ''}}>7</option>
                                            <option value="8" {{$cart->quantity == 8 ? 'selected' : ''}}>8</option>
                                            <option value="9" {{$cart->quantity == 9 ? 'selected' : ''}}>9</option>
                                            <option value="10" {{$cart->quantity == 10 ? 'selected' : ''}}>10</option>
                                        </select>

                                        <!-- Remove -->
                                        <a class="fs-xs text-gray-400 ms-auto" type="button" onclick="cartRemove({{$cart->id}})">
                                            <i class="fe fe-x"></i> Remove
                                        </a>

                                    </div>

                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <!-- Footer -->
                    <div class="row align-items-end justify-content-between mb-10 mb-md-0">
                        <div class="col-12 col-md-7">

                            <!-- Coupon -->
                            <form class="mb-7 mb-md-0" method="POST" action="{{route('apply.coupon')}}">
                                @csrf
                                <label class="form-label fs-sm fw-bold" for="cartCouponCode">
                                    Coupon code:
                                    @if (Session::has('coupon_code'))
                                    <span class="badge bg-dark">{{Session::get('coupon_code')}} <a class="text-primary" href="{{route('remove.coupon')}}">X</a></span>
                                    @endif
                                </label>
                                <div class="row row gx-5">
                                    <div class="col">

                                        <!-- Input -->
                                        <input class="form-control form-control-sm @if($errors->has('coupon')) is-invalid @endif" id="cartCouponCode" type="text"
                                            placeholder="Enter coupon code*" name="code">
                                        @if($errors->has('coupon'))
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $errors->first() }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                    <div class="col-auto">

                                        <!-- Button -->
                                        <button class="btn btn-sm btn-dark" type="submit">
                                            Apply
                                        </button>

                                    </div>
                                </div>
                            </form>

                        </div>
                        {{-- <div class="col-12 col-md-auto">

                            <!-- Button -->
                            <button class="btn btn-sm btn-outline-dark">Update Cart</button>

                        </div> --}}
                    </div>

                </div>
                <div class="col-12 col-md-5 col-lg-4 offset-lg-1">
                    <!-- Total -->
                    <div class="card mb-7 bg-light">
                        <div class="card-body">
                            <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                                <li class="list-group-item d-flex">
                                    <span>Subtotal</span> <span class="ms-auto fs-sm cart-subtotal">${{number_format($carts->sum('price'),2)}}</span>
                                </li>
                                {{-- <li class="list-group-item d-flex">
                                    <span>Shipping</span> <span class="ms-auto fs-sm cart-shipping">${{number_format($carts->sum('shipping'),2)}}</span>
                                </li> --}}
                                <li class="list-group-item d-flex">
                                    <span>Tax</span> <span class="ms-auto fs-sm cart-tax">${{number_format($carts->sum('tax'),2)}}</span>
                                </li>
                                <li class="list-group-item d-flex fs-lg fw-bold">
                                    <span>Total</span> <span class="ms-auto fs-sm cart-total">
                                        @if (Session::has('total_price'))
                                            ${{number_format(Session::get('total_price'),2)}}
                                        @else
                                            ${{number_format($carts->sum('total_price'),2)}}
                                        @endif
                                    </span>
                                </li>
                                <li class="list-group-item fs-sm text-center text-gray-500">
                                    Shipping cost calculated at Checkout *
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Button -->
                    <a class="btn w-100 btn-dark mb-2" href="{{route('checkout')}}">Proceed to Checkout</a>

                    <!-- Link -->
                    <a class="btn btn-link btn-sm px-0 text-body" href="{{route('shop')}}">
                        <i class="fe fe-arrow-left me-2"></i> Continue Shopping
                    </a>

                </div>
            </div>
        </div>
    </section>



    <!-- FEATURES -->
    @include('layouts.feature')

@endsection

@push('script')
    @include('scripts.frontend.cart')
@endpush
