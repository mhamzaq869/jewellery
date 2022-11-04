<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Invoice Print - {{ $order['order_number'] }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/vendors.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/bootstrap.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/themes/semi-dark-layout.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/app-invoice-print.css') }}">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="invoice-print p-3">
                    <div class="invoice-header d-flex justify-content-between flex-md-row flex-column pb-2">
                        <div>
                            {{-- {{dd($order['shipping_address']['address_1'])}} --}}
                            <div class="d-flex mb-1">
                                <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                    <defs>
                                        <linearGradient id="linearGradient-1" x1="100%" y1="10.5120544%"
                                            x2="50%" y2="89.4879456%">
                                            <stop stop-color="#000000" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </linearGradient>
                                        <linearGradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%"
                                            x2="37.373316%" y2="100%">
                                            <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd">
                                        <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                            <g id="Group" transform="translate(400.000000, 178.000000)">
                                                <path class="text-primary" id="Path"
                                                    d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                    style="fill: currentColor"></path>
                                                <path id="Path1"
                                                    d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                    fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                                    points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                                </polygon>
                                                <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                                    points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                                </polygon>
                                                <polygon id="Path-3" fill="url(#linearGradient-2)"
                                                    opacity="0.099999994"
                                                    points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                                </polygon>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <h3 class="text-primary fw-bold ms-1">Vuexy</h3>
                            </div>
                            <p class="card-text mb-25">
                                {{ $order['shipping_address']['address_1'] ?? $order['billing_address']['address_1'] }}</p>
                            <p class="card-text mb-25">
                                {{ $order['shipping_address']['city'] ?? $order['billing_address']['city'] }},
                                {{ $order['shipping_address']['zipcode'] ?? $order['billing_address']['zipcode'] }},
                                {{ $order['shipping_address']['country'] ?? $order['billing_address']['country'] }}
                            </p>
                        </div>
                        <div class="mt-md-0 mt-2">
                            <h4 class="fw-bold text-end mb-1">INVOICE #{{ $order['order_number'] }}</h4>
                            <div class="invoice-date-wrapper">
                                <p class="invoice-date-title">Order Date :</p>
                                <p class="invoice-date">{{ date('d/m/Y', strtotime($order['created_at'])) }}</p>
                            </div>

                        </div>
                    </div>

                    <hr class="my-2" />

                    <div class="row pb-2">
                        <div class="col-sm-6">
                            <h6 class="mb-1">Invoice To:</h6>
                            <p class="mb-25">{{ $order['user']['first_name'] }} {{ $order['user']['last_name'] }}</p>
                            <p class="mb-25">{{ $order['billing_address']['address_1'] ?? '' }}</p>
                            <p class="mb-25">{{ $order['billing_address']['city'] ?? '' }},
                                {{ $order['billing_address']['zipcode'] ?? '' }},
                                {{ $order['billing_address']['country'] ?? '' }}</p>
                            <p class="mb-25">{{ $order['billing_address']['phone'] ?? '' }}</p>
                            <p class="mb-0">{{ $order['user']['email'] ?? '' }}</p>
                        </div>
                        <div class="col-sm-6 mt-sm-0 mt-2">
                            <h6 class="mb-1">Payment Details:</h6>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-1">Total Paid:</td>
                                        <td><strong>${{ number_format($order['total'], 2) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1">Payment Method:</td>
                                        <td>{{ $order['payment_method'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th class="py-1">Product</th>
                                    <th class="py-1">Size</th>
                                    <th class="py-1">Quantity</th>
                                    <th class="py-1">price</th>
                                    <th class="py-1">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order['cart'] as $item)
                                    <tr class="border-bottom">
                                        <td class="py-1">
                                            <p class="card-text fw-bold mb-25">{{ $item['product']['title'] }}</p>
                                        </td>
                                        <td class="py-1">
                                            <span class="fw-bold">{{ ucfirst($item['size']) }}</span>
                                        </td>
                                        <td class="py-1">
                                            <span class="fw-bold">{{ $item['quantity'] }}</span>
                                        </td>
                                        <td class="py-1">
                                            <span class="fw-bold">${{ number_format($item['price'],2) }}</span>
                                        </td>

                                        <td class="py-1">
                                            <span class="fw-bold">${{ number_format($item['price'], 2) }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row invoice-sales-total-wrapper mt-3">
                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                            <p class="card-text mb-0">
                                @if ($order['note'] != '')
                                    <span class="fw-bold">Note:</span>
                                    <span>{{ $order['note'] }}</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                            <div class="invoice-total-wrapper">
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">Subtotal:</p>
                                    <p class="invoice-total-amount">${{ number_format(array_sum(array_column($order['cart'], 'price')), 2) }}
                                    </p>
                                </div>
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">Shipping:</p>
                                    <p class="invoice-total-amount">${{ number_format($order['shippment'], 2) }}</p>
                                </div>
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">Tax:</p>
                                    <p class="invoice-total-amount">${{ number_format($order['tax'], 2) }}</p>
                                </div>
                                <hr class="my-50" />
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">Total:</p>
                                    <p class="invoice-total-amount">${{ number_format($order['total'], 2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-2" />

                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <script src="{{asset('backend/app-assets/vendors/js/vendors.min.js')}}"></script>

    <script src="{{asset('backend/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('backend/app-assets/js/core/app.js')}}"></script>

    <script src="{{ asset('backend/app-assets/js/scripts/pages/app-invoice.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/pages/app-invoice-print.js') }}"></script>


</body>
<!-- END: Body-->

</html>
