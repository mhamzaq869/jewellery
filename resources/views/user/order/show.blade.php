@extends('user.layouts.app')

@section('usercontent')
    <!-- Order -->
    <div class="card card-lg mb-5 border">
        <div class="card-body pb-0">

            <!-- Info -->
            <div class="card card-sm">
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-6 col-lg-3">

                            <!-- Heading -->
                            <h6 class="heading-xxxs text-muted">Order No:</h6>

                            <!-- Text -->
                            <p class="mb-lg-0 fs-sm fw-bold">
                                {{ $order->order_number }}
                            </p>

                        </div>
                        <div class="col-6 col-lg-3">

                            <!-- Heading -->
                            <h6 class="heading-xxxs text-muted">Shipped date:</h6>

                            <!-- Text -->
                            <p class="mb-lg-0 fs-sm fw-bold">
                                <time datetime="2019-10-01">
                                    {{ date('d M, Y', strtotime($order->created_at)) }}
                                </time>
                            </p>

                        </div>
                        <div class="col-6 col-lg-3">

                            <!-- Heading -->
                            <h6 class="heading-xxxs text-muted">Status:</h6>

                            <!-- Text -->
                            <p class="mb-0 fs-sm fw-bold">
                                {{ $order->status }}
                            </p>

                        </div>
                        <div class="col-6 col-lg-3">

                            <!-- Heading -->
                            <h6 class="heading-xxxs text-muted">Order Amount:</h6>

                            <!-- Text -->
                            <p class="mb-0 fs-sm fw-bold">
                                ${{ number_format($order->total, 2) }}
                            </p>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">

            <!-- Heading -->
            <h6 class="mb-7">Order Items ({{$order->cart->count()}})</h6>

            <!-- Divider -->
            <hr class="my-5">

            <!-- List group -->
            <ul class="list-group list-group-lg list-group-flush-y list-group-flush-x">
                @foreach ($order->cart as $i => $item)
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-4 col-md-3 col-xl-2">

                            <!-- Image -->
                            <a href="{{route('product.detail',[$item->product->slug])}}"><img src="{{ asset($item->product->photo) }}" alt="..."
                                    class="img-fluid"></a>

                        </div>
                        <div class="col">

                            <!-- Title -->
                            <p class="mb-4 fs-sm fw-bold">
                                <a class="text-body" href="{{route('product.detail',[$item->product->slug])}}">{{$item->product->title}}</a> <br>
                                <span class="text-muted">${{number_format($item->price)}}</span>
                            </p>

                            <!-- Text -->
                            <div class="fs-sm text-muted">
                                Size: {{$item->size}} <br>
                            </div>

                        </div>
                    </div>
                </li>
                @endforeach
            </ul>

        </div>
    </div>

    <!-- Total -->
    <div class="card card-lg mb-5 border">
        <div class="card-body">

            <!-- Heading -->
            <h6 class="mb-7">Order Total</h6>

            <!-- List group -->
            <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                <li class="list-group-item d-flex">
                    <span>Subtotal</span>
                    <span class="ms-auto">${{number_format($order->cart->sum('price'),2)}}</span>
                </li>
                <li class="list-group-item d-flex">
                    <span>Tax</span>
                    <span class="ms-auto">${{number_format($order->cart->sum('tax'),2)}}</span>
                </li>
                <li class="list-group-item d-flex">
                    <span>Shipping</span>
                    <span class="ms-auto">${{number_format($order->cart->sum('shipping'),2)}}</span>
                </li>
                <li class="list-group-item d-flex fs-lg fw-bold">
                    <span>Total</span>
                    <span class="ms-auto">${{number_format($order->total,2)}}</span>
                </li>
            </ul>

        </div>
    </div>

    <!-- Details -->
    <div class="card card-lg border">
        <div class="card-body">

            <!-- Heading -->
            <h6 class="mb-7">Billing & Shipping Details</h6>

            <!-- Content -->
            <div class="row">
                @if (count($order->billing_address) > 0)
                <div class="col-12 col-md-4">

                    <!-- Heading -->
                    <p class="mb-4 fw-bold">
                        Billing Address:
                    </p>

                    <p class="mb-7 mb-md-0 text-gray-500">
                        {{$order->billing_address['address_1'] ?? ''}}, <br>
                        {{$order->billing_address['address_2'] ?? ''}}, <br>
                        {{$order->billing_address['city'] ?? ''}}, {{$order->billing_address['zipcode']  ?? ''}}, <br>
                        {{$order->billing_address['country']}}, <br>
                        {{$order->billing_address['phone']}}
                    </p>

                </div>
                @endif

                @if (count($order->shipping_address) > 0)
                <div class="col-12 col-md-4">

                    <!-- Heading -->
                    <p class="mb-4 fw-bold">
                        Shipping Address:
                    </p>

                    <p class="mb-7 mb-md-0 text-gray-500">
                        {{$order->shipping_address['address_1'] != null ? $order->shipping_address['address_1'].',' : ''}} <br>
                        {{$order->shipping_address['address_2'] != null ? $order->shipping_address['address_2'].',' : ''}} <br>
                        {{$order->shipping_address['city'] != null ? $order->shipping_address['city'].',' : ''}} {{$order->shipping_address['zipcode'] != null ? $order->shipping_address['zipcode'].',' : ''}}<br>
                        {{$order->shipping_address['country'] != null ? $order->shipping_address['country'].',' : ''}} <br>
                    </p>

                </div>
                @endif
                <div class="col-12 col-md-4">

                    <!-- Heading -->
                    {{-- <p class="mb-4 fw-bold">
                        Shipping Method:
                    </p>

                    <p class="mb-7 text-gray-500">
                        Standart Shipping <br>
                        (5 - 7 days)
                    </p> --}}

                    <!-- Heading -->
                    <p class="mb-4 fw-bold">
                        Payment Method:
                    </p>

                    <p class="mb-0 text-gray-500">
                        {{$order->payment_method}}
                    </p>

                </div>
            </div>

        </div>
    </div>
@endsection
