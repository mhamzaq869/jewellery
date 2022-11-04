@extends('layouts.app')

@section('content')
    <!-- CONTENT -->
    <section class="py-11">
        <div class="container">
            <form class="mb-10 mb-md-0 filterProducts" action="{{route('filter.product')}}" method="GET">
                @csrf
                @method('GET')
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3">
                        <!-- Filters -->
                        @include('frontend.filter')
                    </div>
                    <div class="col-12 col-md-8 col-lg-9">

                        <!-- Slider -->
                        <div class="flickity-page-dots-inner mb-9" data-flickity='{"pageDots": true}'>
                             <!-- Item -->
                             @foreach ($shop_banners as $banner)
                             <div class="w-100">
                                 <div class="card bg-h-100 bg-start" style="background-image: url({{ asset($banner->photo) }});">
                                     <div class="row" style="min-height: 400px;">
                                         <div class="col-12 col-md-10 col-lg-8 col-xl-6 align-self-center">
                                             <div class="card-body px-md-10 py-11">

                                                 <!-- Heading -->
                                                 <h4>
                                                     {{$banner->h1}}
                                                 </h4>

                                                 <!-- Button -->


                                                 @if ($banner->btn_text != null && $banner->btn_text != '')
                                                    <a class="btn btn-link px-0 text-body" href="{{asset('shop'.$banner->link)}}">
                                                        {{$banner->btn_text ?? 'View Collection'}} <i class="fe fe-arrow-right ms-2"></i>
                                                    </a>
                                                 @endif

                                             </div>
                                         </div>

                                     </div>
                                 </div>
                             </div>
                             @endforeach
                        </div>

                        <!-- Header -->
                        <div class="row align-items-center mb-7">
                            <div class="col-12 col-md">

                                <!-- Heading -->
                                <h3 class="mb-1">

                                    @if($category != null && $subcat != null)
                                        {{$category->name}} {{$subcat->name}}
                                    @else
                                    All Products
                                    @endif
                                </h3>

                                <!-- Breadcrumb -->
                                <ol class="breadcrumb mb-md-0 fs-xs text-gray-400">
                                    <li class="breadcrumb-item">
                                        <a class="text-gray-400" href="{{route('home')}}">Home</a>
                                    </li>
                                    @if ($category != null)
                                    <li class="breadcrumb-item active">
                                        {{$category->name}}
                                    </li>
                                    @endif
                                </ol>

                            </div>
                            <div class="col-12 col-md-auto">

                                <!-- Select -->
                                <select class="form-select form-select-xs" name="order_filter" id="order_filter" onchange="filter_product_for('order_filter')">
                                    <option selected disabled>Sort By</option>
                                    <option value="Latest"@isset($order_filter) @if($order_filter=="Latest") selected @endif @endisset>Latest</option>
                                    <option value="Low" @isset($order_filter) @if($order_filter=="Low") selected @endif @endisset>Low to High</option>
                                    <option value="High" @isset($order_filter) @if($order_filter=="High") selected @endif @endisset>High to Low</option>
                                    <option value="Sort_ASC" @isset($order_filter) @if($order_filter=="Sort_ASC") selected @endif @endisset>A to Z</option>
                                    <option value="Sort_DESC" @isset($order_filter) @if($order_filter=="Sort_DESC") selected @endif @endisset>Z to A</option>
                                </select>

                            </div>
                        </div>

                        <!-- Products -->
                        <div class="row productLists">
                            @foreach ($products as $product)
                                <div class="col-6 col-md-4">

                                    <!-- Card -->
                                    <div class="card mb-7">

                                        <!-- Badge -->
                                        <div class="badge bg-white text-body card-badge card-badge-start text-uppercase">
                                            {{$product->condition}}
                                        </div>

                                        <!-- Image -->
                                        <div class="card-img">

                                            <!-- Image -->
                                            <a class="card-img-hover" href="{{route('product.detail',[$product->slug])}}">
                                                <img class="card-img-top card-img-back" src="{{ asset($product->photo_2) }}"
                                                    alt="...">
                                                <img class="card-img-top card-img-front" src="{{ asset($product->photo) }}"
                                                    alt="...">
                                            </a>

                                            <!-- Actions -->
                                            <div class="card-actions">
                                                <span class="card-action">
                                                    <button type="button" class="btn btn-xs btn-circle btn-white-primary"
                                                        onclick="ProductModal({{ $product->id }})">
                                                        <i class="fe fe-eye"></i>
                                                    </button>
                                                </span>
                                                <span class="card-action">
                                                    <button type="button" class="btn btn-xs btn-circle btn-white-primary"
                                                        onclick="addCartSingle('{{ $product->slug }}')">
                                                        <i class="fe fe-shopping-cart"></i>
                                                    </button>
                                                </span>
                                                <span class="card-action">
                                                    <button type="button" class="btn btn-xs btn-circle btn-white-primary"
                                                        onclick="addWishlist({{$product->id}})">
                                                        <i class="fe fe-heart"></i>
                                                    </button>
                                                </span>
                                            </div>

                                        </div>

                                        <!-- Body -->
                                        <div class="card-body px-0">

                                            <!-- Category -->
                                            <div class="fs-xs">
                                                <a class="text-muted"
                                                    href="{{ route('shop', [$product->category->name]) }}">{{ $product->category->name }}</a>
                                                <i class="fa-solid fa-chevron-right font-9"></i>
                                                <a class="text-muted"
                                                    href="{{ route('shop', [$product->category->name, $product->subcategory->name]) }}">{{ $product->subcategory->name }}</a>
                                            </div>

                                            <!-- Title -->
                                            <div class="fw-bold">
                                                <a class="text-body" href="{{route('product.detail',[$product->slug])}}">
                                                    {{ $product->title ?? '--' }}
                                                </a>
                                            </div>

                                            <!-- Price -->

                                            @if ($product->discount > 0)
                                            <div class="fw-bold">
                                                <span class="fs-xs text-gray-350 text-decoration-line-through">${{ $product->price ?? '0.00' }}</span>
                                                <span class="text-primary">${{ $product->price - $product->discount ?? '0.00' }}</span>
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

                        <div class="text-center">
                            <div class="spinner-grow text-secondary mb-1 loader d-none" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>

                            <button type="button" class="btn btn-dark loadmore">Load More</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@push('script')
    @include('scripts.frontend.shopjs')
@endpush
