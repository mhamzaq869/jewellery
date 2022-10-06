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
    <link rel="shortcut icon" href="{{asset('favicon/favicon.ico')}}" type="image/x-icon" />

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('css/libs.bundle.css')}}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('css/theme.bundle.css')}}" />


</head>
<body>

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
          <img class="img-fluid" src="{{asset('img/products/product-5.jpg')}}" alt="...">

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
          <img class="img-fluid" src="{{asset('img/products/product-6.jpg')}}" alt="...">

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
          <img class="img-fluid" src="{{asset('img/products/product-7.jpg')}}" alt="...">

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
          <img class="img-fluid" src="{{asset('img/products/product-8.jpg')}}" alt="...">

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
          <img class="img-fluid" src="{{asset('img/products/product-9.jpg')}}" alt="...">

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
      <strong class="mx-auto">Your Cart (2)</strong>
    </div>

    <!-- List group -->
    <ul class="list-group list-group-lg list-group-flush">
      <li class="list-group-item">
        <div class="row align-items-center">
          <div class="col-4">

            <!-- Image -->
            <a href="product.html">
              <img class="img-fluid" src="{{asset('img/products/product-6.jpg')}}" alt="...">
            </a>

          </div>
          <div class="col-8">

            <!-- Title -->
            <p class="fs-sm fw-bold mb-6">
              <a class="text-body" href="product.html">Cotton floral print Dress</a> <br>
              <span class="text-muted">$40.00</span>
            </p>

            <!--Footer -->
            <div class="d-flex align-items-center">

              <!-- Select -->
              <select class="form-select form-select-xxs w-auto">
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="1">3</option>
              </select>

              <!-- Remove -->
              <a class="fs-xs text-gray-400 ms-auto" href="#!">
                <i class="fe fe-x"></i> Remove
              </a>

            </div>

          </div>
        </div>
      </li>
      <li class="list-group-item">
        <div class="row align-items-center">
          <div class="col-4">

            <!-- Image -->
            <a href="product.html">
              <img class="img-fluid" src="{{asset('img/products/product-10.jpg')}}" alt="...">
            </a>

          </div>
          <div class="col-8">

            <!-- Title -->
            <p class="fs-sm fw-bold mb-6">
              <a class="text-body" href="product.html">Suede cross body Bag</a> <br>
              <span class="text-muted">$49.00</span>
            </p>

            <!--Footer -->
            <div class="d-flex align-items-center">

              <!-- Select -->
              <select class="form-select form-select-xxs w-auto">
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="1">3</option>
              </select>

              <!-- Remove -->
              <a class="fs-xs text-gray-400 ms-auto" href="#!">
                <i class="fe fe-x"></i> Remove
              </a>

            </div>

          </div>
        </div>
      </li>
    </ul>

    <!-- Footer -->
    <div class="offcanvas-footer justify-between lh-fixed fs-sm bg-light mt-auto">
      <strong>Subtotal</strong> <strong class="ms-auto">$89.00</strong>
    </div>

    <!-- Buttons -->
    <div class="offcanvas-body">
      <a class="btn w-100 btn-dark" href="checkout.html">Continue to Checkout</a>
      <a class="btn w-100 btn-outline-dark mt-2" href="shopping-cart.html">View Cart</a>
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
        <a class="btn w-100 btn-outline-dark" href="#!">
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
          <li class="nav-item dropdown">

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

          </li>
        </ul>

        <!-- Nav -->
        <ul class="nav navbar-nav me-8">
          <li class="nav-item">
            <a class="nav-link" href="shipping-and-returns.html">Shipping</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faq.html">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact-us.html">Contact</a>
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
      <a class="navbar-brand" href="overview.html">
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

            <!-- Toggle -->
            <a class="nav-link" href="#">Home</a>


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
                      <nav class="nav nav-tabs nav-overflow fs-xs border-bottom border-bottom-lg-0">
                        <a class="nav-link text-uppercase active" data-bs-toggle="tab" href="#navTab">
                          Women
                        </a>
                        <a class="nav-link text-uppercase" data-bs-toggle="tab" href="#navTab">
                          Men
                        </a>
                        <a class="nav-link text-uppercase" data-bs-toggle="tab" href="#navTab">
                          Kids
                        </a>
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
                        <div class="row">
                          <div class="col-6 col-md">

                            <!-- Heading -->
                            <div class="mb-5 fw-bold">Clothing</div>

                            <!-- Links -->
                            <ul class="list-styled mb-6 mb-md-0 fs-sm">
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">All Clothing</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Blouses & Shirts</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Coats & Jackets</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Dresses</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Hoodies & Sweats</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Denim</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Jeans</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Jumpers & Cardigans</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Leggings</a>
                              </li>
                            </ul>

                          </div>
                          <div class="col-6 col-md">

                            <!-- Heading -->
                            <div class="mb-5 fw-bold">Shoes & Boots</div>

                            <!-- Links -->
                            <ul class="list-styled mb-6 mb-md-0 fs-sm">
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">All Shoes & Boots</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Branded Shoes</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Boots</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Heels</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Trainers</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Sandals</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Shoes</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Wide Fit Shoes</a>
                              </li>
                            </ul>

                          </div>
                          <div class="col-6 col-md">

                            <!-- Heading -->
                            <div class="mb-5 fw-bold">Bags & Accessories</div>

                            <!-- Links -->
                            <ul class="list-styled mb-0 fs-sm">
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">All Bags & Accessories</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Accessories</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Bags & Purses</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Luggage</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Belts</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Hats</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Hair Accessories</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Jewellery</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Travel Accessories</a>
                              </li>
                            </ul>

                          </div>
                          <div class="col-6 col-md">

                            <!-- Heading -->
                            <div class="mb-5 fw-bold">Collections</div>

                            <!-- Links -->
                            <ul class="list-styled mb-0 fs-sm">
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">All Collections</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Occasionwear</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Going Out</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Workwear</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Holiday Shop</a>
                              </li>
                              <li class="list-styled-item">
                                <a class="list-styled-link" href="shop.html">Jean Fit Guide</a>
                              </li>
                            </ul>

                          </div>
                          <div class="col-4 d-none d-lg-block">

                            <!-- Card -->
                            <div class="card">

                              <!-- Image -->
                              <img class="card-img" src="{{asset('img/products/product-110.jpg')}}" alt="...">

                              <!-- Overlay -->
                              <div class="card-img-overlay bg-dark-0 bg-hover align-items-center">
                                <div class="text-center">
                                  <a class="btn btn-white stretched-link" href="shop.html">
                                    Shop Sweaters <i class="fe fe-arrow-right ms-2"></i>
                                  </a>
                                </div>
                              </div>

                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </li>
          <li class="nav-item dropdown">

            <!-- Toggle -->
            <a class="nav-link" href="#">Shop</a>

            <!-- Menu -->
            {{-- <div class="dropdown-menu" style="min-width: 650px;">
              <div class="card card-lg">
                <div class="card-body">
                  <div class="row">
                    <div class="col">

                      <!-- Heading -->
                      <div class="mb-5 fw-bold">Shop</div>

                      <!-- Links -->
                      <ul class="list-styled mb-7 fs-sm">
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="shop.html">Default</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="shop-topbar.html">Topbar</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="shop-collapse.html">Collapse</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="shop-simple.html">Simple</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="shop-masonry.html">Masonry</a>
                        </li>
                      </ul>

                      <!-- Heading -->
                      <div class="mb-5 fw-bold">Product</div>

                      <!-- Links -->
                      <ul class="list-styled fs-sm">
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="product.html">Default</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="product-images-left.html">Images Left</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="product-image-grid.html">Image Grid</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="product-image-slider.html">Image Slider</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="product-images-stacked.html">Images Stacked</a>
                        </li>
                      </ul>

                    </div>
                    <div class="col">

                      <!-- Heading -->
                      <div class="mb-5 fw-bold">Support</div>

                      <!-- Links -->
                      <ul class="list-styled mb-7 fs-sm">
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="shopping-cart.html">Shopping Cart</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="checkout.html">Checkout</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="order-completed.html">Order Completed</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="shipping-and-returns.html">Shipping & Returns</a>
                        </li>
                      </ul>

                      <!-- Heading -->
                      <div class="mb-5 fw-bold">Account</div>

                      <!-- Links -->
                      <ul class="list-styled fs-sm">
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="account-order.html">Order</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="account-orders.html">Orders</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="account-wishlist.html">Wishlist</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="account-personal-info.html">Personal Info</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="account-address.html">Addresses</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="account-address-edit.html">Addresses: New</a>
                        </li>
                      </ul>

                    </div>
                    <div class="col">

                      <!-- Links -->
                      <ul class="list-styled mb-7 fs-sm">
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="account-payment.html">Payment</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="account-payment-edit.html">Payment: New</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="account-payment-choose.html">Payment: Choose</a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" href="auth.html">Auth</a>
                        </li>
                      </ul>

                      <!-- Heading -->
                      <div class="mb-5 fw-bold">Modals</div>

                      <!-- Links -->
                      <ul class="list-styled fs-sm">
                        <li class="list-styled-item">
                          <a class="list-styled-link" data-bs-toggle="modal" href="#modalNewsletterHorizontal">
                            Newsletter: Horizontal
                          </a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" data-bs-toggle="modal" href="#modalNewsletterVertical">
                            Newsletter: Vertical
                          </a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" data-bs-toggle="modal" href="#modalProduct">
                            Product
                          </a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" data-bs-toggle="offcanvas" href="#modalSearch">
                            Search
                          </a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" data-bs-toggle="offcanvas" href="#modalShoppingCart">
                            Shopping Cart
                          </a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" data-bs-toggle="modal" href="#modalSizeChart">
                            Size Chart
                          </a>
                        </li>
                        <li class="list-styled-item">
                          <a class="list-styled-link" data-bs-toggle="modal" href="#modalWaitList">
                            Wait List
                          </a>
                        </li>
                      </ul>

                    </div>
                  </div>
                </div>
              </div>
            </div> --}}

          </li>
          <li class="nav-item dropdown">

            <!-- Toggle -->
            <a class="nav-link" href="#">Contact Us</a>

            <!-- Menu -->
            {{-- <div class="dropdown-menu">
              <div class="card card-lg">
                <div class="card-body">
                  <ul class="list-styled fs-sm">
                    <li class="list-styled-item">
                      <a class="list-styled-link" href="about.html">About</a>
                    </li>
                    <li class="list-styled-item">
                      <a class="list-styled-link" href="contact-us.html">Contact Us</a>
                    </li>
                    <li class="list-styled-item">
                      <a class="list-styled-link" href="store-locator.html">Store Locator</a>
                    </li>
                    <li class="list-styled-item">
                      <a class="list-styled-link" href="faq.html">FAQ</a>
                    </li>
                    <li class="list-styled-item">
                      <a class="list-styled-link" href="coming-soon.html">Coming Soon</a>
                    </li>
                    <li class="list-styled-item">
                      <a class="list-styled-link" href="404.html">404</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div> --}}

          </li>
          <li class="nav-item dropdown">
            <!-- Toggle -->
            <a class="nav-link" href="#">About Us</a>
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
            <a class="nav-link" href="account-orders.html">
              <i class="fe fe-user"></i>
            </a>
          </li>
          <li class="nav-item ms-lg-n4">
            <a class="nav-link" href="account-wishlist.html">
              <i class="fe fe-heart"></i>
            </a>
          </li>
          <li class="nav-item ms-lg-n4">
            <a class="nav-link" data-bs-toggle="offcanvas" href="#modalShoppingCart">
              <span data-cart-items="2">
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
  @include('modals.newsletter')

  @include('layouts.footer')
</body>
</html>
