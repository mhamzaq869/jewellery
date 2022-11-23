@extends('layouts.app')

@section('content')
    <!-- SLIDER -->
    <section>
        <div data-flickity='{"prevNextButtons": true, "fade": true}'>

            @foreach ($main_banners as $banner)
                <!-- Item -->
                <div class="w-100 bg-cover" style="background-image: url({{ asset($banner->photo) }});">
                    <div class="container d-flex flex-column">
                        <div class="row align-items-center py-12" style="min-height: 550px;">
                            <div class="col-12 col-md-6 col-lg-5 col-xl-4 offset-md-1">

                                <!-- Heading -->
                                <h1 style="color: {{$banner->h1_color}}">{{$banner->h1 ?? ''}}</h1>

                                <!-- Heading -->
                                <h2 class="display-1 text-primary" style="color: {{$banner->h2_color}} !important">{{$banner->h2 ?? ''}}</h2>

                                <!-- Heading -->
                                <h5 class="mt-n4 mb-8" style="color: {{$banner->h3_color}}">{{$banner->h3 ?? ''}}</h5>

                                <!-- Button -->
                                <a class="btn btn-dark" href="{{$banner->link ?? '#'}}" style="color: {{$banner->btn_text_color}};background-color: {{$banner->btn_bg_color}};border-color: {{$banner->btn_bg_color}}">
                                    {{$banner->btn_text ?? 'Shop Now'}} <i class="fe fe-arrow-right ms-2"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <!-- CATEGORIES -->
    @if ($cat_banners->count() > 0)
    <section class="pt-6">
        <div class="container-fluid px-3 px-md-6">
            <div class="row mx-n3">
                @foreach ($cat_banners as $banner)
                <div class="col-12 col-sm-4 d-flex flex-column px-3">

                    <!-- Card-->
                    <div class="card card-xl mb-3 mb-sm-0" style="min-height: 280px">

                        <!-- Background -->
                        <div class="card-bg">
                            <div class="card-bg-img bg-cover" style="background-image: url({{ asset($banner->photo) }});"></div>
                        </div>

                        <!-- Body -->
                        <div class="card-body my-auto">

                            <!-- Heading -->
                            <h5 class="mb-0" style="color: {{$banner->h1_color}}">{{$banner->h1}}</h5>

                            <!-- Link -->
                            @if ($banner->btn_text != null && $banner->btn_text != '')
                            <a class="btn btn-link stretched-link px-0 text-reset" style="color:{{$banner->btn_text_color}} !important" href="{{asset($banner->link)}}">
                                {{$banner->btn_text}} <i class="fe fe-arrow-right ms-2"></i>
                            </a>
                            @endif

                        </div>

                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </section>
    @endif
    <!-- ARRIVALS -->
    @if ($products->where('condition', 'new')->count() > 0)
    <section class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- Heading -->
                    <h2 class="mb-10 text-center">New Arrivals</h2>

                </div>
            </div>
            <div class="flickity-page-dots-progress" data-flickity='{"pageDots": true}'>
                <!-- Item -->
                @foreach ($products->where('condition', 'new') as $product)
                    <div class="col px-4" style="max-width: 300px;">
                        <!-- Card -->
                        <div class="card mb-7">

                            <!-- Badge -->
                            <div class="badge bg-white text-body card-badge card-badge-start text-uppercase">
                                {{ $product->condition }}
                            </div>

                            <!-- Image -->
                            <div class="card-img">

                                <!-- Image -->
                                <a class="card-img-hover" href="{{ route('product.detail', [$product->slug]) }}">
                                    <img class="card-img-top card-img-back" src="{{ asset($product->photo_2) }}"
                                        alt="...">
                                    <img class="card-img-top card-img-front" src="{{ asset($product->photo) }}"
                                        alt="...">
                                </a>

                                <!-- Actions -->
                                <div class="card-actions">
                                    <span class="card-action">
                                        <button class="btn btn-xs btn-circle btn-white-primary"
                                            onclick="ProductModal({{ $product->id }})">
                                            <i class="fe fe-eye"></i>
                                        </button>
                                    </span>
                                    <span class="card-action">
                                        <button class="btn btn-xs btn-circle btn-white-primary"
                                            onclick="addCartSingle('{{ $product->slug }}')">
                                            <i class="fe fe-shopping-cart"></i>
                                        </button>
                                    </span>
                                    <span class="card-action">
                                        <button class="btn btn-xs btn-circle btn-white-primary"
                                            onclick="addWishlist({{ $product->id }})">
                                            <i class="fe fe-heart"></i>
                                        </button>
                                    </span>
                                </div>

                            </div>

                            <!-- Body -->
                            <div class="card-body px-0">


                                <!-- Title -->
                                <div class="fw-bold">
                                    <a class="text-body" href="{{ route('product.detail', [$product->slug]) }}">
                                        {{ $product->title ?? '--' }}
                                    </a>
                                </div>

                                <!-- Price -->

                                @if ($product->discount > 0)
                                    <div class="fw-bold">
                                        <span
                                            class="fs-xs text-gray-350 text-decoration-line-through">${{ $product->price ?? '0.00' }}</span>
                                        <span
                                            class="text-primary">${{ $product->price - $product->discount ?? '0.00' }}</span>
                                    </div>
                                @else
                                    <div class="fw-bold text-muted">
                                        ${{ $product->price ?? '0.00' }}
                                    </div>
                                @endif




                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- FEATURED -->
    @if ($products->where('is_featured', 1)->count() > 0)
    <section class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                    <!-- Heading -->
                    <h2 class="mb-10 text-center">Featured Products</h2>

                </div>
            </div>
            <div class="row">
                @foreach ($products->where('is_featured', 1) as $product)
                    <div class="col-6 col-md-4 col-lg-3">
                        <!-- Card -->
                        <div class="card mb-7">

                            <!-- Badge -->
                            <div class="badge bg-white text-body card-badge card-badge-start text-uppercase">
                                {{ $product->condition }}
                            </div>

                            <!-- Image -->
                            <div class="card-img">

                                <!-- Image -->
                                <a class="card-img-hover" href="{{ route('product.detail', [$product->slug]) }}">
                                    <img class="card-img-top card-img-back" src="{{ asset($product->photo_2) }}"
                                        alt="...">
                                    <img class="card-img-top card-img-front" src="{{ asset($product->photo) }}"
                                        alt="...">
                                </a>

                                <!-- Actions -->
                                <div class="card-actions">
                                    <span class="card-action">
                                        <button class="btn btn-xs btn-circle btn-white-primary"
                                            onclick="ProductModal({{ $product->id }})">
                                            <i class="fe fe-eye"></i>
                                        </button>
                                    </span>
                                    <span class="card-action">
                                        <button class="btn btn-xs btn-circle btn-white-primary"
                                            onclick="addCartSingle('{{ $product->slug }}')">
                                            <i class="fe fe-shopping-cart"></i>
                                        </button>
                                    </span>
                                    <span class="card-action">
                                        <button class="btn btn-xs btn-circle btn-white-primary"
                                            onclick="addWishlist({{ $product->id }})">
                                            <i class="fe fe-heart"></i>
                                        </button>
                                    </span>
                                </div>

                            </div>

                            <!-- Body -->
                            <div class="card-body px-0">


                                <!-- Title -->
                                <div class="fw-bold">
                                    <a class="text-body" href="{{ route('product.detail', [$product->slug]) }}">
                                        {{ $product->title ?? '--' }}
                                    </a>
                                </div>

                                <!-- Price -->

                                @if ($product->discount > 0)
                                    <div class="fw-bold">
                                        <span
                                            class="fs-xs text-gray-350 text-decoration-line-through">${{ $product->price ?? '0.00' }}</span>
                                        <span
                                            class="text-primary">${{ $product->price - $product->discount ?? '0.00' }}</span>
                                    </div>
                                @else
                                    <div class="fw-bold text-muted">
                                        ${{ $product->price ?? '0.00' }}
                                    </div>
                                @endif




                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- HOT -->
    @if ($products->where('condition', 'hot')->count() > 0)
    <section class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- Heading -->
                    <h2 class="mb-10 text-center">Hot Products</h2>

                </div>
            </div>
            <div class="flickity-page-dots-progress" data-flickity='{"pageDots": true}'>
                <!-- Item -->
                @foreach ($products->where('condition', 'hot') as $product)
                    <div class="col px-4" style="max-width: 300px;">
                        <!-- Card -->
                        <div class="card mb-7">

                            <!-- Badge -->
                            <div class="badge bg-white text-body card-badge card-badge-start text-uppercase">
                                {{ $product->condition }}
                            </div>

                            <!-- Image -->
                            <div class="card-img">

                                <!-- Image -->
                                <a class="card-img-hover" href="{{ route('product.detail', [$product->slug]) }}">
                                    <img class="card-img-top card-img-back" src="{{ asset($product->photo_2) }}"
                                        alt="...">
                                    <img class="card-img-top card-img-front" src="{{ asset($product->photo) }}"
                                        alt="...">
                                </a>

                                <!-- Actions -->
                                <div class="card-actions">
                                    <span class="card-action">
                                        <button class="btn btn-xs btn-circle btn-white-primary"
                                            onclick="ProductModal({{ $product->id }})">
                                            <i class="fe fe-eye"></i>
                                        </button>
                                    </span>
                                    <span class="card-action">
                                        <button class="btn btn-xs btn-circle btn-white-primary"
                                            onclick="addCartSingle('{{ $product->slug }}')">
                                            <i class="fe fe-shopping-cart"></i>
                                        </button>
                                    </span>
                                    <span class="card-action">
                                        <button class="btn btn-xs btn-circle btn-white-primary"
                                            onclick="addWishlist({{ $product->id }})">
                                            <i class="fe fe-heart"></i>
                                        </button>
                                    </span>
                                </div>

                            </div>

                            <!-- Body -->
                            <div class="card-body px-0">


                                <!-- Title -->
                                <div class="fw-bold">
                                    <a class="text-body" href="{{ route('product.detail', [$product->slug]) }}">
                                        {{ $product->title ?? '--' }}
                                    </a>
                                </div>

                                <!-- Price -->

                                @if ($product->discount > 0)
                                    <div class="fw-bold">
                                        <span
                                            class="fs-xs text-gray-350 text-decoration-line-through">${{ $product->price ?? '0.00' }}</span>
                                        <span
                                            class="text-primary">${{ $product->price - $product->discount ?? '0.00' }}</span>
                                    </div>
                                @else
                                    <div class="fw-bold text-muted">
                                        ${{ $product->price ?? '0.00' }}
                                    </div>
                                @endif




                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- BRANDS -->
    @if ($brands->count() > 0)
    <section class="py-12 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Heading -->
                    <h2 class="mb-10 text-center">
                        Shop by Brand
                    </h2>

                </div>
            </div>
            <div class="row">
                @foreach ($brands as $brand)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <!-- Brand -->
                        <a class="brand lift mb-7 text-center" href="shop.html">
                            <img class="brand-img" src="{{ asset($brand->image) }}" alt="{{ $brand->name }}">
                        </a>

                    </div>
                @endforeach

            </div>
    </section>
    @endif

    <!-- REVIEWS -->
    <section class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                    <!-- Preheading -->
                    <h6 class="heading-xxs mb-3 text-gray-400">
                        What buyers say
                    </h6>

                    <!-- Heading -->
                    <h2 class="mb-10">Latest buyers Reviews</h2>

                </div>
            </div>
            <div class="row">
                <div class="col-12">

                    <!-- Slider -->
                    <div data-flickity='{"pageDots": true}'>
                        @foreach ($reviews as $review)
                        <div class="col-12 col-sm-8 col-md-6 col-lg-4 px-4">

                            <!-- Card -->
                            <div class="card-lg card border">
                                <div class="card-body">

                                    <!-- Header -->
                                    <div class="row align-items-center mb-6">
                                        <div class="col-4">

                                            <!-- Image -->
                                            @if ($review->product != null)
                                            <img src="{{ asset($review->product->photo) }}" alt="..." class="img-fluid">
                                            @else
                                            <img src="{{ asset('img/products/no-image.jpg') }}" alt="no image" class="img-fluid">
                                            @endif

                                        </div>
                                        <div class="col-8 ms-n2">

                                            <!-- Preheading -->
                                            <a class="fs-xs text-muted" href="{{($review->product != null ? route('product.detail',[$review->product->slug])  : '#')}}">
                                                {{$review->product->subcategory->name ?? 'Unknown'}}
                                            </a>

                                            <!-- Heading -->
                                            <a class="d-block fw-bold text-body" href="{{($review->product != null ? route('product.detail',[$review->product->slug])  : '#')}}">
                                                {{$review->product->title ?? 'Unknown'}}
                                            </a>

                                            <!-- Rating -->
                                            <div class="rating fs-xxs text-warning" data-value="{{$review->rating ?? 5}}">
                                                <div class="rating-item">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="rating-item">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="rating-item">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="rating-item">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="rating-item">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Blockquote -->
                                    <blockquote class="mb-0">
                                        <p class="text-muted">
                                            {{ $review->review ?? '--'}}
                                        </p>
                                        <footer class="fs-xs text-muted">
                                            {{$review->user->name ?? '--'}}, <time datetime="{{\Carbon\Carbon::parse($review->created_at)->format('d M Y')}}">{{\Carbon\Carbon::parse($review->created_at)->format('d M Y')}}</time>
                                        </footer>
                                    </blockquote>

                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
