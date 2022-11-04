@extends('backend.layouts.app')

@section('title', 'Order')
@section('home_url', route('order.index'))
@section('page', 'Detail')

@section('content')
<div class="content-body">
    <section class="invoice-preview-wrapper">

        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-12 col-md-12 col-12">
                <div class="card invoice-preview-card">

                    <div class="card-body invoice-padding pb-0 p-5">
                        <!-- Header starts -->
                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                            <div>
                                <h4 class="fw-bolder mb-0">Deliver To</h4>

                                <p class="card-text mb-25">{{$order->shipping_address['address_1'] ?? $order->billing_address['address_1']}}</p>
                                <p class="card-text mb-25">{{$order->shipping_address['city'] ?? $order->billing_address['city']}},
                                    {{$order->shipping_address['zipcode'] ?? $order->billing_address['zipcode']}},
                                    {{$order->shipping_address['country'] ?? $order->billing_address['country']}}</p>

                            </div>
                            <div class="mt-md-0 mt-2">

                                <div class="invoice-date-wrapper">
                                    <p class="invoice-date-title">Order Number :</p>
                                    <p class="invoice-date">#{{$order->order_number}}</p>
                                </div>
                                <div class="invoice-date-wrapper">
                                    <p class="invoice-date-title">Order Date :</p>
                                    <p class="invoice-date">{{date('d/m/Y', strtotime($order->created_at))}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Header ends -->
                    </div>

                    <hr class="invoice-spacing" />

                    <!-- Address and Contact starts -->
                    <div class="card-body invoice-padding pt-0">
                        <div class="row invoice-spacing">
                            <div class="col-xl-9 p-0">
                                <h6 class="mb-2">Customer Detail:</h6>
                                <h6 class="mb-25">{{$order->user->first_name}} {{$order->user->last_name}}</h6>
                                <p class="card-text mb-25">{{$order->billing_address['address_1'] ?? ''}}</p>
                                <p class="card-text mb-25">{{$order->billing_address['city'] ?? ''}}, {{$order->billing_address['zipcode'] ?? ''}}, {{$order->billing_address['country'] ?? ''}}</p>
                                <p class="card-text mb-25">{{$order->billing_address['phone'] ?? ''}}</p>
                                <p class="card-text mb-0">{{$order->user->email ?? ''}}</p>
                            </div>
                            <div class="col-xl-3 p-0 mt-xl-0 mt-2">
                                <h6 class="mb-2">Payment Details:</h6>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pe-1">Total Paid:</td>
                                            <td><span class="fw-bold">${{number_format($order->total,2)}}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="pe-1">Payment Method:</td>
                                            <td>{{$order->payment_method}}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-1">Payment Status:</td>
                                            <td>@if ($order->payment_status == 'paid')
                                                <span class="badge badge-light-success">{{$order->payment_status}}</span>
                                                @else
                                                <span class="badge badge-light-danger">{{$order->payment_status}}</span>

                                             @endif</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Address and Contact ends -->

                    <!-- Invoice Description starts -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="py-1" colspan="2">Product</th>
                                    <th class="py-1">Size</th>
                                    <th class="py-1">Quantity</th>
                                    <th class="py-1">price</th>
                                    <th class="py-1">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->cart as $item)
                                <tr class="border-bottom">
                                    <td class="py-1">
                                        <img src="{{asset($item->product->photo)}}" alt="" width="50px">
                                    </td>
                                    <td class="py-1">
                                        <p class="card-text fw-bold mb-25">{{$item->product->title}}</p>
                                    </td>
                                    <td class="py-1">
                                        <span class="fw-bold">{{ucfirst($item->size)}}</span>
                                    </td>
                                    <td class="py-1">
                                        <span class="fw-bold">{{$item->quantity}}</span>
                                    </td>
                                    <td class="py-1">
                                        <span class="fw-bold">${{number_format($item->price,2)}}</span>
                                    </td>

                                    <td class="py-1">
                                        <span class="fw-bold">${{number_format($item->price,2)}}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body invoice-padding pb-0">
                        <div class="row invoice-sales-total-wrapper">
                            <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                @if ($order->note != '')
                                <span class="fw-bold">Note:</span>
                                <span>{{$order->note}}</span>
                                @endif
                            </div>
                            <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                <div class="invoice-total-wrapper">
                                    <div class="invoice-total-item">
                                        <p class="invoice-total-title">Subtotal:</p>
                                        <p class="invoice-total-amount">${{number_format($order->cart->sum('price'),2)}}</p>
                                    </div>
                                    <div class="invoice-total-item">
                                        <p class="invoice-total-title">Shipping:</p>
                                        <p class="invoice-total-amount">${{number_format($order->shippment,2)}}</p>
                                    </div>
                                    <div class="invoice-total-item">
                                        <p class="invoice-total-title">Tax:</p>
                                        <p class="invoice-total-amount">${{number_format($order->tax,2)}}</p>
                                    </div>
                                    <hr class="my-50" />
                                    <div class="invoice-total-item">
                                        <p class="invoice-total-title">Total:</p>
                                        <p class="invoice-total-amount">${{number_format($order->total,2)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Invoice Description ends -->


                    <!-- Invoice Note starts -->
                    <div class="card-body invoice-padding pt-0">
                        <div class="row">
                            <div class="col-12">

                            </div>
                        </div>
                    </div>
                    <!-- Invoice Note ends -->
                </div>
            </div>
            <!-- /Invoice -->

        </div>
    </section>


</div>
@endsection

