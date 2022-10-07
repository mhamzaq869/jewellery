@extends('layouts.app')

@section('content')
    <!-- CONTENT -->
    <section class="py-11">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">

                    <!-- Filters -->
                    @include('frontend.filter')

                </div>
                <div class="col-12 col-md-8 col-lg-9">

                    <!-- Slider -->
                    <div class="flickity-page-dots-inner mb-9" data-flickity='{"pageDots": true}'>

                        <!-- Item -->
                        <div class="w-100">
                            <div class="card bg-h-100 bg-start"
                                style="background-image: url({{ asset('img/covers/cover-24.jpg') }});">
                                <div class="row" style="min-height: 400px;">
                                    <div class="col-12 col-md-10 col-lg-8 col-xl-6 align-self-center">
                                        <div class="card-body px-md-10 py-11">

                                            <!-- Heading -->
                                            <h4>
                                                2019 Summer Collection
                                            </h4>

                                            <!-- Button -->
                                            <a class="btn btn-link px-0 text-body" href="shop.html">
                                                View Collection <i class="fe fe-arrow-right ms-2"></i>
                                            </a>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 col-lg-4 col-xl-6 d-none d-md-block bg-cover"
                                        style="background-image: url({{ asset('img/covers/cover-16.jpg')}});"></div>
                                </div>
                            </div>
                        </div>


                        <!-- Item -->
                        <div class="w-100">
                            <div class="card bg-cover" style="background-image: url({{ asset('/img/covers/cover-29.jpg')}})">
                                <div class="row align-items-center" style="min-height: 400px;">
                                    <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                                        <div class="card-body px-md-10 py-11">

                                            <!-- Heading -->
                                            <h4 class="mb-5">Get -50% from Summer Collection</h4>

                                            <!-- Text -->
                                            <p class="mb-7">
                                                Appear, dry there darkness they're seas. <br>
                                                <strong class="text-primary">Use code 4GF5SD</strong>
                                            </p>

                                            <!-- Button -->
                                            <a class="btn btn-outline-dark" href="shop.html">
                                                Shop Now <i class="fe fe-arrow-right ms-2"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="w-100">
                            <div class="card bg-cover" style="background-image: url({{ asset('/img/covers/cover-30.jpg')}});">
                                <div class="row align-items-center" style="min-height: 400px;">
                                    <div class="col-12">
                                        <div class="card-body px-md-10 py-11 text-center text-white">

                                            <!-- Preheading -->
                                            <p class="text-uppercase">Enjoy an extra</p>

                                            <!-- Heading -->
                                            <h1 class="display-4 text-uppercase">50% off</h1>

                                            <!-- Link -->
                                            <a class="link-underline text-reset" href="shop.html">Shop Collection</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Header -->
                    <div class="row align-items-center mb-7">
                        <div class="col-12 col-md">

                            <!-- Heading -->
                            <h3 class="mb-1">Womens' Clothing</h3>

                            <!-- Breadcrumb -->
                            <ol class="breadcrumb mb-md-0 fs-xs text-gray-400">
                                <li class="breadcrumb-item">
                                    <a class="text-gray-400" href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Women's Clothing
                                </li>
                            </ol>

                        </div>
                        <div class="col-12 col-md-auto">

                            <!-- Select -->
                            <select class="form-select form-select-xs">
                                <option selected>Most popular</option>
                            </select>

                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="row mb-7">
                        <div class="col-12">

                            <span class="btn btn-xs btn-light fw-normal text-muted me-3 mb-3">
                                Shift dresses <a class="text-reset ms-2" href="#!" role="button">
                                    <i class="fe fe-x"></i>
                                </a>
                            </span>
                            <span class="btn btn-xs btn-light fw-normal text-muted me-3 mb-3">
                                Summer <a class="text-reset ms-2" href="#!" role="button">
                                    <i class="fe fe-x"></i>
                                </a>
                            </span>
                            <span class="btn btn-xs btn-light fw-normal text-muted me-3 mb-3">
                                M <a class="text-reset ms-2" href="#!" role="button">
                                    <i class="fe fe-x"></i>
                                </a>
                            </span>
                            <span class="btn btn-xs btn-light fw-normal text-muted me-3 mb-3">
                                White <a class="text-reset ms-2" href="#!" role="button">
                                    <i class="fe fe-x"></i>
                                </a>
                            </span>
                            <span class="btn btn-xs btn-light fw-normal text-muted me-3 mb-3">
                                Red <a class="text-reset ms-2" href="#!" role="button">
                                    <i class="fe fe-x"></i>
                                </a>
                            </span>
                            <span class="btn btn-xs btn-light fw-normal text-muted me-3 mb-3">
                                Adidas <a class="text-reset ms-2" href="#!" role="button">
                                    <i class="fe fe-x"></i>
                                </a>
                            </span>
                            <span class="btn btn-xs btn-light fw-normal text-muted me-3 mb-3">
                                $10.00 - $49.00 <a class="text-reset ms-2" href="#!" role="button">
                                    <i class="fe fe-x"></i>
                                </a>
                            </span>
                            <span class="btn btn-xs btn-light fw-normal text-muted me-3 mb-3">
                                $50.00 - $99.00 <a class="text-reset ms-2" href="#!" role="button">
                                    <i class="fe fe-x"></i>
                                </a>
                            </span>

                        </div>
                    </div>

                    <!-- Products -->
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-6 col-md-4">

                            <!-- Card -->
                            <div class="card mb-7">

                                <!-- Badge -->
                                <div class="badge bg-white text-body card-badge card-badge-start text-uppercase">
                                    New
                                </div>

                                <!-- Image -->
                                <div class="card-img">

                                    <!-- Image -->
                                    <a class="card-img-hover" href="product.html">
                                        <img class="card-img-top card-img-back" src="{{asset($product->photo_2)}}"
                                            alt="...">
                                        <img class="card-img-top card-img-front" src="{{asset($product->photo)}}"
                                            alt="...">
                                    </a>

                                    <!-- Actions -->
                                    <div class="card-actions">
                                        <span class="card-action">
                                            <button class="btn btn-xs btn-circle btn-white-primary" onclick="ProductModal({{$product->id}})">
                                                <i class="fe fe-eye"></i>
                                            </button>
                                        </span>
                                        <span class="card-action">
                                            <button class="btn btn-xs btn-circle btn-white-primary" onclick="addCart('{{$product->slug}}')">
                                                <i class="fe fe-shopping-cart"></i>
                                            </button>
                                        </span>
                                        <span class="card-action">
                                            <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                                                <i class="fe fe-heart"></i>
                                            </button>
                                        </span>
                                    </div>

                                </div>

                                <!-- Body -->
                                <div class="card-body px-0">

                                    <!-- Category -->
                                    <div class="fs-xs">
                                        <a class="text-muted" href="{{route('shop',[$product->category->name])}}">{{$product->category->name}}</a>
                                        <i class="fa-solid fa-chevron-right font-9"></i>
                                        <a class="text-muted" href="{{route('shop',[$product->category->name,$product->subcategory->name])}}">{{$product->subcategory->name}}</a>
                                    </div>

                                    <!-- Title -->
                                    <div class="fw-bold">
                                        <a class="text-body" href="product.html">
                                            {{$product->title ?? '--'}}
                                        </a>
                                    </div>

                                    <!-- Price -->
                                    <div class="fw-bold text-muted">
                                        ${{$product->price ?? '0.00'}}
                                    </div>

                                </div>

                            </div>

                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <nav class="d-flex justify-content-center justify-content-md-end">
                        <ul class="pagination pagination-sm text-gray-400">
                            <li class="page-item">
                                <a class="page-link page-link-arrow" href="#">
                                    <i class="fa fa-caret-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">4</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">5</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">6</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link page-link-arrow" href="#">
                                    <i class="fa fa-caret-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </section>

    @include('modals.products')

@endsection
