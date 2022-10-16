@extends('user.layouts.app')

@section('usercontent')
    <div class="row">
        @foreach ($wishlists as $wishlist)
        <div class="col-6 col-md-4" id="wishlist_{{$wishlist->id}}">

            <!-- Card -->
            <div class="card mb-7">

                <!-- Badge -->
                <div class="badge bg-white text-body card-badge card-badge-start text-uppercase">
                    {{$wishlist->product->condition}}
                </div>

                <!-- Image -->
                <div class="card-img">
                    <!-- Action -->
                    <button class="btn btn-xs btn-circle btn-white-primary card-action card-action-end"
                        onclick="removeWishlist({{$wishlist->id}})">
                        <i class="fe fe-x"></i>
                    </button>
                    <!-- Image -->
                    <a class="card-img-hover" href="{{route('product.detail',[$wishlist->product->slug])}}">
                        <img class="card-img-top card-img-back" src="{{ asset($wishlist->product->photo_2) }}"
                            alt="...">
                        <img class="card-img-top card-img-front" src="{{ asset($wishlist->product->photo) }}"
                            alt="...">
                    </a>

                    <!-- Actions -->
                    <div class="card-actions">
                        <span class="card-action">
                            <button class="btn btn-xs btn-circle btn-white-primary"
                                onclick="ProductModal({{ $wishlist->product->id }})">
                                <i class="fe fe-eye"></i>
                            </button>
                        </span>
                        <span class="card-action">
                            <button class="btn btn-xs btn-circle btn-white-primary"
                                onclick="addCartSingle('{{ $wishlist->product->slug }}')">
                                <i class="fe fe-shopping-cart"></i>
                            </button>
                        </span>
                        {{-- <span class="card-action">
                            <button class="btn btn-xs btn-circle btn-white-primary"
                               onclick="addWishlist({{$wishlist->product->id}})">
                                <i class="fe fe-heart"></i>
                            </button>
                        </span> --}}
                    </div>

                </div>

                <!-- Body -->
                <div class="card-body px-0">

                    <!-- Category -->
                    <div class="fs-xs">
                        <a class="text-muted"
                            href="{{ route('shop', [$wishlist->product->category->name]) }}">{{ $wishlist->product->category->name }}</a>
                        <i class="fa-solid fa-chevron-right font-9"></i>
                        <a class="text-muted"
                            href="{{ route('shop', [$wishlist->product->category->name, $wishlist->product->subcategory->name]) }}">{{ $wishlist->product->subcategory->name }}</a>
                    </div>

                    <!-- Title -->
                    <div class="fw-bold">
                        <a class="text-body" href="{{route('product.detail',[$wishlist->product->slug])}}">
                            {{ $wishlist->product->title ?? '--' }}
                        </a>
                    </div>

                    <!-- Price -->

                    @if ($wishlist->product->discount > 0)
                    <div class="fw-bold">
                        <span class="fs-xs text-gray-350 text-decoration-line-through">${{ $wishlist->product->price ?? '0.00' }}</span>
                        <span class="text-primary">${{ $wishlist->product->price - $wishlist->product->discount ?? '0.00' }}</span>
                    </div>
                    @else
                    <div class="fw-bold text-muted">
                        ${{ $wishlist->product->price ?? '0.00' }}
                    </div>
                    @endif


                </div>

            </div>

        </div>
        @endforeach
    </div>
@endsection

@push('script')
    @include('scripts.user.wishlistjs')
@endpush
