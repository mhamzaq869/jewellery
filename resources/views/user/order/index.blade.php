@extends('user.layouts.app')

@section('usercontent')
    <!-- Order -->
    @foreach ($orders as $order)
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
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6">
                        <div class="row gx-5 mb-4 mb-lg-0">

                            @foreach ($order->cart as $i => $item)
                                @if ($i <= 2)
                                    <div class="col-3">
                                        <!-- Image -->
                                        <div class="ratio ratio-1x1 bg-cover"
                                            style="background-image: url({{ asset($item->product->photo) }});"></div>
                                    </div>
                                @endif
                            @endforeach

                            @if ($i > 2)
                                <div class="col-3">

                                    <!-- Image -->
                                    <div class="ratio ratio-1x1 bg-light">
                                        <a class="ratio-item ratio-item-text text-reset" href="#!">
                                            <div class="fs-xxs fw-bold">
                                                +{{ $order->cart->count() - 3 }} <br> more
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row gx-5">
                            <div class="col-6">

                                <!-- Button -->
                                <a class="btn btn-sm w-100 btn-outline-dark"
                                    href="{{ route('user.orders.show', [$order->order_number]) }}">
                                    Order Details
                                </a>

                            </div>
                            <div class="col-6">

                                <!-- Button -->
                                <a class="btn btn-sm w-100 btn-outline-dark" type="button" data-bs-toggle="collapse"
                                    href="#orderTrack{{ $order->order_number }}" for="orderTrack{{ $order->order_number }}">
                                    Track order
                                </a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="collapse" id="orderTrack{{ $order->order_number }}">
            <div class="card">
                <div class="card-body">
                    <div class="tracking">
                        <div class="title">Tracking Order</div>
                    </div>
                    <div class="progress-track">
                        <ul id="progressbar">
                            <li class="step0 active" id="step1">Ordered</li>
                            <li class="step0 active text-center" id="step2">Shipped</li>
                            <li class="step0 active text-right" id="step3">On the way</li>
                            <li class="step0 text-right" id="step4">Delivered</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    @endforeach

    <!-- Pagination -->
    <nav class="d-flex justify-content-center justify-content-md-end mt-10">
        <ul class="pagination pagination-sm text-gray-400">
            <li class="page-item">
                <a class="page-link page-link-arrow" href="{{ $orders->previousPageUrl() }}">
                    <i class="fa fa-caret-left"></i>
                </a>
            </li>

            @for ($i = 1; $i <= $orders->lastPage(); $i++)
                <li class="page-item {{ $orders->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item">
                <a class="page-link page-link-arrow" href="{{ $orders->nextPageUrl() }}">
                    <i class="fa fa-caret-right"></i>
                </a>
            </li>
        </ul>
    </nav>

@endsection
