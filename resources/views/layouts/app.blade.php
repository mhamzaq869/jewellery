<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" type="image/x-icon" />

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('css/libs.bundle.css') }}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme.bundle.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">



    <style>
        #progressbar {
            margin-bottom: 3vh;
            overflow: hidden;
            color: rgb(252, 103, 49);
            padding-left: 0px;
            margin-top: 3vh
        }

        #progressbar li {
            list-style-type: none;
            font-size: x-small;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400;
            font-size: 15px;
            color: rgb(160, 159, 159);
        }

        #progressbar #step1:before {
            content: "";
            color: rgb(252, 103, 49);
            width: 15px;
            height: 15px;
            margin-left: 0px !important;
            /* padding-left: 11px !important */
        }

        #progressbar #step2:before {
            content: "";
            color: #fff;
            width: 15px;
            height: 15px;
            margin-left: 32%;
        }

        #progressbar #step3:before {
            content: "";
            color: #fff;
            width: 15px;
            height: 15px;
            margin-right: 32%;
            /* padding-right: 11px !important */
        }

        #progressbar #step4:before {
            content: "";
            color: #fff;
            width: 15px;
            height: 15px;
            margin-right: 0px !important;
            /* padding-right: 11px !important */
        }

        #progressbar li:before {
            line-height: 29px;
            display: block;
            font-size: 12px;
            background: #ddd;
            border-radius: 50%;
            margin: auto;
            z-index: -1;
            margin-bottom: 1vh;
        }

        #progressbar li:after {
            content: '';
            height: 10px;
            background: #ddd;
            position: absolute;
            left: 0%;
            right: 0%;
            margin-bottom: 2vh;
            top: 2px;
            z-index: 1;
        }

        #progressbar li:nth-child(2):after {
            margin-right: auto;
        }

        #progressbar li:nth-child(1):after {
            margin: auto;
        }

        #progressbar li:nth-child(3):after {
            float: left;
            width: 68%;
        }

        #progressbar li:nth-child(4):after {
            margin-left: auto;
            width: 132%;
        }

        #progressbar li.active {
            color: black;
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: rgb(252, 103, 49);
        }
    </style>

</head>

<body class="@yield('body-color')">

    <!-- Search -->
    <div class="offcanvas offcanvas-end" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Close -->
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fe fe-x" aria-hidden="true"></i>
        </button>

        <!-- Header-->
        <div class="offcanvas-header lh-fixed fs-lg">
            <strong class="mx-auto">Search Products</strong>
        </div>

        <!-- Body: Form -->
        <div class="offcanvas-body">
            <form>
                <div class="form-group">
                    <label class="visually-hidden" for="modalSearchCategories">Categories:</label>
                    <select class="form-select" id="modalSearchCategories">
                        <option selected>All Categories</option>
                        <option>Women</option>
                        <option>Men</option>
                        <option>Kids</option>
                    </select>
                </div>
                <div class="input-group input-group-merge">
                    <input class="form-control" type="search" placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-border" type="submit">
                            <i class="fe fe-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Body: Results (add `.d-none` to disable it) -->
        <div class="offcanvas-body border-top fs-sm">

            <!-- Heading -->
            <p>Search Results:</p>

            <!-- Items -->
            <div class="row align-items-center position-relative mb-5">
                <div class="col-4 col-md-3">

                    <!-- Image -->
                    <img class="img-fluid" src="{{ asset('img/products/product-5.jpg') }}" alt="...">

                </div>
                <div class="col position-static">

                    <!-- Text -->
                    <p class="mb-0 fw-bold">
                        <a class="stretched-link text-body" href="product.html">Leather mid-heel Sandals</a> <br>
                        <span class="text-muted">$129.00</span>
                    </p>

                </div>
            </div>
            <div class="row align-items-center position-relative mb-5">
                <div class="col-4 col-md-3">

                    <!-- Image -->
                    <img class="img-fluid" src="{{ asset('img/products/product-6.jpg') }}" alt="...">

                </div>
                <div class="col position-static">

                    <!-- Text -->
                    <p class="mb-0 fw-bold">
                        <a class="stretched-link text-body" href="product.html">Cotton floral print Dress</a> <br>
                        <span class="text-muted">$40.00</span>
                    </p>

                </div>
            </div>
            <div class="row align-items-center position-relative mb-5">
                <div class="col-4 col-md-3">

                    <!-- Image -->
                    <img class="img-fluid" src="{{ asset('img/products/product-7.jpg') }}" alt="...">

                </div>
                <div class="col position-static">

                    <!-- Text -->
                    <p class="mb-0 fw-bold">
                        <a class="stretched-link text-body" href="product.html">Leather Sneakers</a> <br>
                        <span class="text-primary">$85.00</span>
                    </p>

                </div>
            </div>
            <div class="row align-items-center position-relative mb-5">
                <div class="col-4 col-md-3">

                    <!-- Image -->
                    <img class="img-fluid" src="{{ asset('img/products/product-8.jpg') }}" alt="...">

                </div>
                <div class="col position-static">

                    <!-- Text -->
                    <p class="mb-0 fw-bold">
                        <a class="stretched-link text-body" href="product.html">Cropped cotton Top</a> <br>
                        <span class="text-muted">$29.00</span>
                    </p>

                </div>
            </div>
            <div class="row align-items-center position-relative mb-5">
                <div class="col-4 col-md-3">

                    <!-- Image -->
                    <img class="img-fluid" src="{{ asset('img/products/product-9.jpg') }}" alt="...">

                </div>
                <div class="col position-static">

                    <!-- Text -->
                    <p class="mb-0 fw-bold">
                        <a class="stretched-link text-body" href="product.html">Floral print midi Dress</a> <br>
                        <span class="text-muted">$50.00</span>
                    </p>

                </div>
            </div>

            <!-- Button -->
            <a class="btn btn-link px-0 text-reset" href="shop.html">
                View All <i class="fe fe-arrow-right ms-2"></i>
            </a>

        </div>

        <!-- Body: Empty (remove `.d-none` to enable it) -->
        <div class="offcanvas-body d-none">

            <!-- Text -->
            <p class="mb-3 fs-sm text-center">
                Nothing matches your search
            </p>

            <!-- Smiley -->
            <p class="mb-0 fs-sm text-center">
                😞
            </p>

        </div>

    </div>

    <!-- Shopping Cart -->
    <div class="offcanvas offcanvas-end" id="modalShoppingCart" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Full cart (add `.d-none` to disable it) -->

        <!-- Close -->
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fe fe-x" aria-hidden="true"></i>
        </button>

        <!-- Header-->
        <div class="offcanvas-header lh-fixed fs-lg">
            <strong class="mx-auto">Your Cart (<span id="cart_length">0</span>)</strong>
        </div>

        <!-- List group -->
        <ul class="list-group list-group-lg list-group-flush cart-append">
        </ul>

        <!-- Footer -->
        <div class="offcanvas-footer justify-between lh-fixed fs-sm bg-light mt-auto">
            <strong>Subtotal</strong> <strong class="ms-auto cart_subtotal">0</strong>
        </div>

        <!-- Buttons -->
        <div class="offcanvas-body">
            <a class="btn w-100 btn-dark" href="{{ route('checkout') }}">Continue to Checkout</a>
            <a class="btn w-100 btn-outline-dark mt-2" href="{{ route('cart') }}">View Cart</a>
        </div>

        <!-- Empty cart (remove `.d-none` to enable it) -->
        <div class="d-none">

            <!-- Close -->
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fe fe-x" aria-hidden="true"></i>
            </button>

            <!-- Header-->
            <div class="offcanvas-header lh-fixed fs-lg">
                <strong class="mx-auto">Your Cart (0)</strong>
            </div>

            <!-- Body -->
            <div class="offcanvas-body flex-grow-0 my-auto">

                <!-- Heading -->
                <h6 class="mb-7 text-center">Your cart is empty 😞</h6>

                <!-- Button -->
                <a class="btn w-100 btn-outline-dark" href="">
                    Continue Shopping
                </a>

            </div>

        </div>

    </div>

    <!-- NAVBAR -->
    <div class="navbar navbar-topbar navbar-expand-xl navbar-light bg-light">
        <div class="container">

            <!-- Promo -->
            <div class="me-xl-8">
                <i class="fe fe-truck me-2"></i> <span class="heading-xxxs">Free shipping worldwide</span>
            </div>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topbarCollapse"
                aria-controls="topbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="topbarCollapse">

                <!-- Nav -->
                <ul class="nav nav-divided navbar-nav me-auto">
                    {{-- <li class="nav-item dropdown">

            <!-- Toggle -->
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
              <img class="mb-1 me-1" src="{{asset('img/flags/usa.svg')}}" alt="..." /> United States
            </a>

            <!-- Menu -->
            <div class="dropdown-menu min-w-0">
              <a class="dropdown-item" href="#!">
                <img class="mb-1 me-2" src="{{asset('img/flags/usa.svg')}}" alt="USA">United States
              </a>
              <a class="dropdown-item" href="#!">
                <img class="mb-1 me-2" src="{{asset('img/flags/canada.svg')}}" alt="Canada">Canada
              </a>
              <a class="dropdown-item" href="#!">
                <img class="mb-1 me-2" src="{{asset('img/flags/germany.svg')}}" alt="Germany">Germany
              </a>
            </div>

          </li>
          <li class="nav-item dropdown">

            <!-- Toggle -->
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">USD</a>

            <!-- Menu -->
            <div class="dropdown-menu min-w-0">
              <a class="dropdown-item" href="#!">USD</a>
              <a class="dropdown-item" href="#!">EUR</a>
            </div>

          </li>
          <li class="nav-item dropdown">

            <!-- Toggle -->
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">English</a>

            <!-- Menu -->
            <div class="dropdown-menu min-w-0">
              <a class="dropdown-item" href="#">English</a>
              <a class="dropdown-item" href="#">French</a>
              <a class="dropdown-item" href="#">German</a>
            </div>

          </li> --}}
                </ul>

                <!-- Nav -->
                <ul class="nav navbar-nav me-8">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shipping.returns') }}">Shipping</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>

                <!-- Nav -->
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item">
                        <a class="nav-link text-gray-350" href="#!">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="nav-item ms-xl-n4">
                        <a class="nav-link text-gray-350" href="#!">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item ms-xl-n4">
                        <a class="nav-link text-gray-350" href="#!">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="nav-item ms-xl-n4">
                        <a class="nav-link text-gray-350" href="#!">
                            <i class="fab fa-medium"></i>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="{{ route('home') }}">
                Shopper.
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <!-- Nav -->
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown position-static">

                        <!-- Toggle -->
                        <a class="nav-link" data-bs-toggle="dropdown" href="#">Catalog</a>

                        <!-- Menu -->
                        <div class="dropdown-menu w-100">

                            <!-- Tabs -->
                            <div class="mb-2 mb-lg-0 border-bottom-lg">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">

                                            <!-- Nav -->
                                            <nav
                                                class="nav nav-tabs nav-overflow fs-xs border-bottom border-bottom-lg-0">
                                                @foreach ($menu_categories as $i => $category)
                                                    <a class="nav-link text-uppercase {{ $i == 0 ? 'active' : '' }}"
                                                        data-bs-toggle="tab" href="#{{ $category->name }}">
                                                        {{ $category->name }}
                                                    </a>
                                                @endforeach
                                                {{-- <a class="nav-link text-uppercase" data-bs-toggle="tab" href="#navTab">
                          Men
                        </a>
                        <a class="nav-link text-uppercase" data-bs-toggle="tab" href="#navTab">
                          Kids
                        </a> --}}
                                            </nav>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab content -->
                            <div class="card card-lg">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="navTab">
                                            <div class="container">
                                                @if (count($menu_categories) > 0)
                                                    @php
                                                        $sub_categories = \DB::table('categories')
                                                            ->where('parent_id', $menu_categories[0]->id)
                                                            ->where('status', 1)
                                                            ->get();
                                                    @endphp
                                                    <div class="row">
                                                        <div class="col-6 col-md">
                                                            <!-- Links -->
                                                            <ul class="list-styled mb-6 mb-md-0 fs-sm">
                                                                @foreach ($sub_categories->take(10) as $category)
                                                                    <li class="list-styled-item">
                                                                        <a class="list-styled-link"
                                                                            href="{{ route('shop', [$menu_categories[0]->name, $category->name]) }}">{{ $category->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="col-6 col-md">
                                                            <ul class="list-styled mb-6 mb-md-0 fs-sm">
                                                                @foreach ($sub_categories->skip(10)->take(10) as $category)
                                                                    <li class="list-styled-item">
                                                                        <a class="list-styled-link"
                                                                            href="shop.html">{{ $category->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="col-6 col-md">
                                                            <ul class="list-styled mb-6 mb-md-0 fs-sm">
                                                                @foreach ($sub_categories->skip(20)->take(10) as $category)
                                                                    <li class="list-styled-item">
                                                                        <a class="list-styled-link"
                                                                            href="shop.html">{{ $category->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="col-6 col-md">
                                                            <ul class="list-styled mb-6 mb-md-0 fs-sm">
                                                                @foreach ($sub_categories->skip(30)->take(10) as $category)
                                                                    <li class="list-styled-item">
                                                                        <a class="list-styled-link"
                                                                            href="shop.html">{{ $category->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="col-4 d-none d-lg-block">

                                                            <!-- Card -->
                                                            <div class="card">

                                                                <!-- Image -->
                                                                <img class="card-img"
                                                                    src="{{ asset('img/products/product-110.jpg') }}"
                                                                    alt="...">

                                                                <!-- Overlay -->
                                                                <div
                                                                    class="card-img-overlay bg-dark-0 bg-hover align-items-center">
                                                                    <div class="text-center">
                                                                        <a class="btn btn-white stretched-link"
                                                                            href="shop.html">
                                                                            Shop Sweaters <i
                                                                                class="fe fe-arrow-right ms-2"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                </ul>

                <!-- Nav -->
                <ul class="navbar-nav flex-row">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="offcanvas" href="#modalSearch">
                            <i class="fe fe-search"></i>
                        </a>
                    </li>
                    <li class="nav-item ms-lg-n4">
                        <a class="nav-link" href="{{ route('user.orders.index') }}">
                            <i class="fe fe-user"></i>
                        </a>
                    </li>
                    <li class="nav-item ms-lg-n4">
                        <a class="nav-link" href="{{ route('wishlist.index') }}">
                            <i class="fe fe-heart"></i>
                        </a>
                    </li>
                    <li class="nav-item ms-lg-n4">
                        <a class="nav-link" data-bs-toggle="offcanvas" href="#modalShoppingCart">
                            <span data-cart-items="{{ $carts->count() }}" id="nav_cart_count">
                                <i class="fe fe-shopping-cart"></i>
                            </span>
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>


    @yield('content')

    <!-- MODALS -->
    @include('modals.products')
    @include('modals.newsletter')
    @include('layouts.footer')

</body>

</html>
