@extends('layouts.app')

@section('content')
    <!-- BREADCRUMB -->
    <nav class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Breadcrumb -->
                    <ol class="breadcrumb mb-0 fs-xs text-gray-400">
                        <li class="breadcrumb-item">
                            <a class="text-gray-400" href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-gray-400" href="shop.html">{{ $product->category->name }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ $product->subcategory->name }}
                        </li>
                    </ol>

                </div>
            </div>
        </div>
    </nav>

    <!-- PRODUCT -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-6">

                            <!-- Images -->
                            <div class="row gx-5 mb-10 mb-md-0">
                                <div class="col-2">

                                    <!-- Slider -->
                                    <div class="flickity-nav flickity-vertical"
                                        data-flickity='{"asNavFor": "#productSlider", "draggable": false}'>
                                        @foreach ($product->decode_images as $images)
                                            <!-- Item -->
                                            <div class="ratio ratio-1x1 bg-cover mb-4"
                                                style="background-image: url({{ asset($images) }});"></div>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="col-10">

                                    <!-- Card -->
                                    <div class="card">

                                        @if ($product->quantity == 0)
                                            <!-- Badge -->
                                            <div class="badge bg-secondary card-badge card-badge-end text-uppercase">
                                                Out of Stock
                                            </div>
                                        @endif

                                        <!-- Slider -->
                                        <div data-flickity='{"draggable": true, "fade": false}' id="productSlider">

                                            @foreach ($product->decode_images as $i => $images)
                                                <a href="#" data-bigpicture='{ "imgSrc": "{{ asset($images) }}"}'>
                                                    <img src="{{ asset($images) }}" alt="image-{{ $i }}"
                                                        class="card-img-top">
                                                </a>
                                            @endforeach

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-6 ps-lg-10">

                            <!-- Header -->
                            <div class="row mb-1">
                                <div class="col">

                                    <!-- Preheading -->
                                    <a class="text-muted"
                                        href="{{ route('shop', [$product->category->name, $product->subcategory->name]) }}">{{ $product->subcategory->name }}</a>

                                </div>
                                <div class="col-auto">

                                    <!-- Rating -->
                                    <div class="rating fs-xs text-warning" data-value="{{$reviews->avg('rating')}}">
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

                                    <a class="fs-sm text-reset ms-2" href="#reviews">
                                        Reviews ({{$reviews->count()}})
                                    </a>

                                </div>
                            </div>

                            <!-- Heading -->
                            <h3 class="mb-2">{{ $product->title }}</h3>

                            <!-- Price -->
                            <div class="mb-7">
                                @if ($product->discount > 0)
                                    <span
                                        class="fs-lg fw-bold text-gray-350 text-decoration-line-through">${{ $product->price ?? '0.00' }}</span>
                                    <span
                                        class="ms-1 fs-5 fw-bolder text-primary">${{ $product->price - $product->discount ?? '0.00' }}</span>
                                @else
                                    <span class="ms-1 fs-5 fw-bold">${{ $product->price ?? '0.00' }}</span>
                                @endif
                                <span class="fs-sm ms-1">(In Stock)</span>
                            </div>

                            <!-- Form -->
                            <form action="{{ route('add.to.cart') }}" method="POST" id="addToCartForm">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" class="product_id" name="product_id" value="{{ $product->id }}">
                                    <!-- Label -->
                                    <p class="mb-4">
                                        Size: <strong><span id="sizeCaption">Choose size</span></strong>
                                    </p>

                                    <!-- Radio -->
                                    <div class="mb-5">
                                        <div class="form-check form-check-inline form-check-size mb-2">
                                            <input type="radio" class="form-check-input" name="size" id="sizeRadioFour"
                                                value="Small" data-toggle="form-caption" data-target="#sizeCaption"
                                                @if (in_array('small', $product->decode_size)) checked @endif>
                                            <label class="form-check-label" for="sizeRadioFour">Small</label>
                                        </div>
                                        <div class="form-check form-check-inline form-check-size mb-2">
                                            <input type="radio" class="form-check-input" name="size" id="sizeRadioFive"
                                                value="Medium" data-toggle="form-caption" data-target="#sizeCaption"
                                                @if (in_array('medium', $product->decode_size)) checked @endif>
                                            <label class="form-check-label" for="sizeRadioFive">Medium</label>
                                        </div>
                                        <div class="form-check form-check-inline form-check-size mb-2">
                                            <input type="radio" class="form-check-input" name="size" id="sizeRadioSix"
                                                value="Large" data-toggle="form-caption" data-target="#sizeCaption"
                                                @if (in_array('large', $product->decode_size)) checked @endif>
                                            <label class="form-check-label" for="sizeRadioSix">Large</label>
                                        </div>

                                    </div>

                                    <div class="row gx-5 mb-7 ">
                                        @if ($product->quantity > 0)
                                            <div class="col-12 col-lg-auto mt-5">

                                                <!-- Quantity -->
                                                <select class="form-select mb-2" name="quantity">
                                                    <option value="1" selected>1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>

                                            </div>
                                            <div class="col-12 col-lg mt-5">

                                                <!-- Submit -->
                                                <button type="submit" class="btn w-100 btn-dark mb-2">
                                                    Add to Cart <i class="fe fe-shopping-cart ms-2"></i>
                                                </button>

                                            </div>
                                        @else
                                            <div class="col-12 col-lg mt-5">
                                                <!-- Submit -->
                                                <button class="btn w-100 btn-dark mb-2" type="button" data-bs-target="#modalWaitList" data-bs-toggle="modal">
                                                    <i class="fe fe-mail me-2"></i> Wait List
                                                </button>
                                            </div>
                                        @endif

                                        <div class="col-12 col-lg-auto mt-5">

                                            <!-- Wishlist -->
                                            <button class="btn btn-outline-dark w-100 mb-2" data-toggle="button">
                                                Wishlist <i class="fe fe-heart ms-2"></i>
                                            </button>

                                        </div>
                                    </div>

                                    <!-- Text -->
                                    @if ($product->quantity < 0)
                                        <p>
                                            <span class="text-gray-500">Is your size/color sold out?</span>
                                            <button type="button" class="text-reset text-decoration-underline" >Join the Wait List!</button>
                                        </p>
                                    @endif

                                    <!-- Share -->
                                    <p class="mb-0">
                                        <span class="me-4">Share:</span>
                                        <button type="button" class="btn btn-xxs btn-circle btn-light fs-xxxs text-gray-350" id="twitter">
                                            <i class="fab fa-twitter"></i>
                                        </button>
                                        <button type="button" class="btn btn-xxs btn-circle btn-light fs-xxxs text-gray-350" id="facebook">
                                            <i class="fab fa-facebook-f"></i>
                                        </button>
                                        <button type="button" class="btn btn-xxs btn-circle btn-light fs-xxxs text-gray-350" id="pinterest">
                                            <i class="fab fa-pinterest-p"></i>
                                        </button>
                                    </p>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DESCRIPTION -->
    <section class="pt-11">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Nav -->
                    <div class="nav nav-tabs nav-overflow justify-content-start justify-content-md-center border-bottom">
                        <a class="nav-link active" data-bs-toggle="tab" href="#descriptionTab">
                            Description
                        </a>
                        {{-- <a class="nav-link" data-bs-toggle="tab" href="#sizeTab">
                            Size & Fit
                        </a>
                        <a class="nav-link" data-bs-toggle="tab" href="#shippingTab">
                            Shipping & Return
                        </a> --}}
                    </div>

                    <!-- Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="descriptionTab">
                            <div class="row justify-content-center py-9">
                                <div class="col-12 col-lg-10 col-xl-8">
                                    <div class="row">
                                        <div class="col-12">
                                            {!! $product->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sizeTab">
                            <div class="row justify-content-center py-9">
                                <div class="col-12 col-lg-10 col-xl-8">
                                    <div class="row">
                                        <div class="col-12 col-md-6">

                                            <!-- Text -->
                                            <p class="mb-4">
                                                <strong>Fitting information:</strong>
                                            </p>

                                            <!-- List -->
                                            <ul class="mb-md-0 text-gray-500">
                                                <li>
                                                    Upon seas hath every years have whose
                                                    subdue creeping they're it were.
                                                </li>
                                                <li>
                                                    Make great day bearing.
                                                </li>
                                                <li>
                                                    For the moveth is days don't said days.
                                                </li>
                                            </ul>

                                        </div>
                                        <div class="col-12 col-md-6">

                                            <!-- Text -->
                                            <p class="mb-4">
                                                <strong>Model measurements:</strong>
                                            </p>

                                            <!-- List -->
                                            <ul class="list-unstyled text-gray-500">
                                                <li>Height: 1.80 m</li>
                                                <li>Bust/Chest: 89 cm</li>
                                                <li>Hips: 91 cm</li>
                                                <li>Waist: 65 cm</li>
                                                <li>Model size: M</li>
                                            </ul>

                                            <!-- Size -->
                                            <p class="mb-0">
                                                <img src="assets/img/icons/icon-ruler.svg" alt="..."
                                                    class="img-fluid">
                                                <a class="text-reset text-decoration-underline ms-3"
                                                    data-bs-toggle="modal" href="#modalSizeChart">Size chart</a>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="shippingTab">
                            <div class="row justify-content-center py-9">
                                <div class="col-12 col-lg-10 col-xl-8">

                                    <!-- Table -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Shipping Options</th>
                                                    <th>Delivery Time</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Standard Shipping</td>
                                                    <td>Delivery in 5 - 7 working days</td>
                                                    <td>$8.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Express Shipping</td>
                                                    <td>Delivery in 3 - 5 working days</td>
                                                    <td>$12.00</td>
                                                </tr>
                                                <tr>
                                                    <td>1 - 2 day Shipping</td>
                                                    <td>Delivery in 1 - 2 working days</td>
                                                    <td>$12.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Free Shipping</td>
                                                    <td>
                                                        Living won't the He one every subdue meat replenish
                                                        face was you morning firmament darkness.
                                                    </td>
                                                    <td>$0.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Caption -->
                                    <p class="mb-0 text-gray-500">
                                        May, life blessed night so creature likeness their, for. <a
                                            class="text-body text-decoration-underline" href="#!">Find out more</a>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- PRODUCTS -->
    <section class="pt-11">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Heading -->
                    <h4 class="mb-10 text-center">You might also like</h4>

                    <!-- Items -->
                    <div class="row">
                        @foreach ($product->related->where('id', '!=', $product->id)->flatten() as $product)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3">

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
                                                    data-toggle="button">
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
            </div>
        </div>
    </section>

    <!-- REVIEWS -->
    @if ($reviews->count() > 0)
    <section class="pt-9 pb-11" id="reviews">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Heading -->
                    <h4 class="mb-10 text-center">Customer Reviews</h4>

                    <!-- Header -->
                    <div class="row align-items-center">
                        <div class="col-12 col-md-auto">
                            <!-- Rating -->
                            <div class="rating text-warning h6 mb-4 mb-md-0" data-value="{{$reviews->avg('rating')}}">
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

                            <!-- Count -->
                            <strong class="fs-sm ms-2">Reviews ({{$reviews->count()}})</strong>

                        </div>
                        <div class="col-12 col-md text-md-center"></div>
                        @auth
                        <div class="col-12 col-md-auto">

                            <!-- Button -->
                            <a class="btn btn-sm btn-dark" data-bs-toggle="collapse" href="#reviewForm">
                                Write Review
                            </a>

                        </div>
                        @endauth
                    </div>

                    <!-- New Review -->
                    @auth
                    <div class="collapse" id="reviewForm">

                        <!-- Divider -->
                        <hr class="my-8">

                        <!-- Form -->
                        <form method="POST" action="{{ route('product.review') }}">
                            @csrf

                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                            <div class="row">
                                <div class="col-12 mb-6 text-center">

                                    <!-- Text -->
                                    <p class="mb-1 fs-xs">
                                        Score:
                                    </p>

                                    <!-- Rating form -->
                                    <div class="rating-form">

                                        <!-- Input -->
                                        <input class="rating-input" name="rating" type="range" min="1"
                                            max="5" value="5">

                                        <!-- Rating -->
                                        <div class="rating h5 text-dark" data-value="5">
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
                                <div class="col-12 col-md-6">

                                    <!-- Name -->
                                    <div class="form-group">
                                        <label class="visually-hidden" for="reviewName">Your Name:</label>
                                        <input class="form-control form-control-sm" name="name" id="reviewName"
                                            type="text" placeholder="Your Name *" required>
                                    </div>

                                </div>
                                <div class="col-12 col-md-6">

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label class="visually-hidden" for="reviewEmail">Your Email:</label>
                                        <input class="form-control form-control-sm" name="email" id="reviewEmail"
                                            type="email" placeholder="Your Email *" required>
                                    </div>

                                </div>
                                <div class="col-12">

                                    <!-- Name -->
                                    <div class="form-group">
                                        <label class="visually-hidden" for="reviewTitle">Review Title:</label>
                                        <input class="form-control form-control-sm" name="title" id="reviewTitle"
                                            type="text" placeholder="Review Title *" required>
                                    </div>

                                </div>
                                <div class="col-12">

                                    <!-- Name -->
                                    <div class="form-group">
                                        <label class="visually-hidden" for="reviewText">Review:</label>
                                        <textarea class="form-control form-control-sm" name="review" id="reviewText" rows="5" placeholder="Review *"
                                            required></textarea>
                                    </div>

                                </div>
                                <div class="col-12 text-center">

                                    <!-- Button -->
                                    <button class="btn btn-outline-dark" type="submit">
                                        Post Review
                                    </button>

                                </div>
                            </div>
                        </form>

                    </div>
                    @endauth
                    <!-- Reviews -->
                    <div class="mt-8">
                        <!-- Review -->
                        @foreach ($reviews as $review)
                        <div class="review">
                            <!-- Body -->
                            <div class="review-body">
                                <div class="row">
                                    <div class="col-12 col-md-auto">

                                        <!-- Avatar -->
                                        <div class="avatar avatar-xxl mb-6 mb-md-0">
                                            <span class="avatar-title rounded-circle">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md">

                                        <!-- Header -->
                                        <div class="row mb-6">
                                            <div class="col-12">

                                                <!-- Rating -->
                                                <div class="rating fs-sm text-warning" data-value="{{$review->rating}}">
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
                                            <div class="col-12">

                                                <!-- Time -->
                                                <span class="fs-xs text-muted">
                                                    {{$review->user->name}}, <time datetime="{{date('Y-m-d',strtotime($review->created_at))}}">{{date('d M, Y',strtotime($review->created_at))}}</time>
                                                </span>

                                            </div>
                                        </div>

                                        <!-- Title -->
                                        <p class="mb-2 fs-lg fw-bold">
                                            {{$review->title}}
                                        </p>

                                        <!-- Text -->
                                        <p class="text-gray-500">
                                            {{$review->review}}
                                        </p>


                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <nav class="d-flex justify-content-center justify-content-md-end mt-10">
                        <ul class="pagination pagination-sm text-gray-400">
                            <li class="page-item">
                                <a class="page-link page-link-arrow" href="{{ $reviews->previousPageUrl() }}">
                                    <i class="fa fa-caret-left"></i>
                                </a>
                            </li>

                            @for ($i = 1; $i <= $reviews->lastPage(); $i++)
                                <li class="page-item {{ $reviews->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $reviews->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item">
                                <a class="page-link page-link-arrow" href="{{ $reviews->nextPageUrl() }}">
                                    <i class="fa fa-caret-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- FEATURES -->
    @include('layouts.feature')
    @include('modals.waitlist')
@endsection
{{--
@push('script')
    <script>
        //Product Review
        $("#reviewForm").submit(function(e) {
            e.preventDefault(); // prevent actual form submit

            var form = $(this);
            var url = form.attr('action'); //get submit url [replace url here if desired]
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes form input
                success: function(response) {
                    if(response.status == true){
                        CartProducts();
                        $(".modalProduct").modal('hide');
                        $('.size-error').addClass('d-none')
                        alertNotification('info','Cart',response.message)
                    }else{
                        alertNotification('error','Cart',response.message)
                    }
                }
            });
        });
    </script>
@endpush --}}
