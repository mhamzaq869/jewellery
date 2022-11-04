@extends('backend.layouts.app')

@section('title', 'Banner')
@section('home_url', route('admin.dashboard'))
@section('page', 'Update')

@push('style')
     <!-- Flickity CSS -->
     <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <style>
        .card-bg~* {
            z-index: 1;
        }

        .card-xl .card-body, .card-xl .card-footer {
            padding: 2.5rem;
        }
        .card-body {
            flex: 0 0 auto;
        }

        .card-bg {
            height: 100%;
            left: 0;
            overflow: hidden;
            position: absolute;
            top: 0;
            width: 100%;
        }
        .bg-cover {
            background-position: 50%!important;
            background-repeat: no-repeat!important;
            background-size: cover!important;
        }

        .card-bg-img {
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            transition: all .2s ease-in-out;
            transition-property: transform;
            width: calc(100% + 0.25rem);
        }
    </style>
@endpush
@section('content')
    <div class="content-body">
        <!-- SLIDER -->
        <section>
            <div class="card py-4">
                <div class="card-header">
                    <h2>Main Slider </h2>
                    <button class="btn btn-outline-primary ml-3" onclick="addSlide('main_slider')"> +Add Slide</button>
                </div>
                <div class="card-body">
                    <div data-flickity='{"prevNextButtons": true, "fade": true}'>

                        <!-- Item -->
                        @foreach ($main_banners as $banner)
                        <div class="w-100 bg-cover" style="background-image: url({{ asset($banner->photo) }});">

                            <div class="text-end m-2">
                                <button type="button" onclick="changeSlider({{$banner->id}})" class="btn btn-icon bg-white rounded-circle btn-outline-primary float-right">
                                    <i data-feather='edit-3'></i>
                                </button>
                            </div>

                            @if ($banner->status == 1)
                            <div class="text-end m-2">
                                <button type="button" class="btn btn-icon bg-success rounded-circle text-white float-right">
                                    <i data-feather='check-circle'></i>
                                </button>
                            </div>
                            @else
                            <div class="text-end m-2">
                                <button type="button" class="btn btn-icon bg-danger rounded-circle text-white float-right">
                                    <i data-feather='x-circle'></i>
                                </button>
                            </div>
                            @endif
                            <div class="container d-flex flex-column">
                                <div class="row align-items-center py-12" style="min-height: 550px;">
                                    <div class="col-12 col-md-6 col-lg-5 col-xl-4 offset-md-1">

                                        <!-- Heading -->
                                        <h1 style="color: {{$banner->h1_color}}">{{$banner->h1}}</h1>

                                        <!-- Heading -->
                                        <h2 class="display-1 text-primary" style="color: {{$banner->h2_color}}">{{$banner->h2}}</h2>

                                        <!-- Heading -->
                                        <h5 class="mt-n4 mb-8" style="color: {{$banner->h3_color}}">{{$banner->h3}}</h5>

                                        <!-- Button -->
                                        <a class="btn btn-dark" href="shop.html">
                                            {{$banner->btn_text}} <i class="fe fe-arrow-right ms-2"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </section>

         <!-- CATEGORIES -->
        @if ($cat_banners->count() > 0)
        <section>
            <div class="card">
                <div class="card-header">
                    <h2>Categories Images</h2>
                </div>
                <div class="card-body">
                    <div class="row mx-n3">
                        @foreach ($cat_banners as $banner)
                        <div class="col-12 col-sm-4 d-flex flex-column">

                            <!-- Card-->
                            <div class="card card-xl mb-3 mb-sm-0" style="min-height: 280px">

                                <!-- Background -->
                                <div class="card-bg">
                                    <div class="card-bg-img bg-cover" style="background-image: url({{ asset($banner->photo) }}); filter:brightness(0.9)"></div>
                                    <div class="text-end m-2">
                                        <button type="button" onclick="changeSlider({{$banner->id}})" class="btn btn-icon bg-white rounded-circle btn-outline-primary float-right">
                                            <i data-feather='edit-3'></i>
                                        </button>
                                    </div>
                                    @if ($banner->status == 1)
                                    <div class="text-end m-2">
                                        <button type="button" class="btn btn-icon bg-success rounded-circle text-white float-right">
                                            <i data-feather='check-circle'></i>
                                        </button>
                                    </div>
                                    @else
                                    <div class="text-end m-2">
                                        <button type="button" class="btn btn-icon bg-danger rounded-circle text-white float-right">
                                            <i data-feather='x-circle'></i>
                                        </button>
                                    </div>
                                    @endif
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
            </div>
        </section>
        @endif
    </div>

    <!-- Slider Modal -->
    <div id="slider" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="sliderMyModalLabel"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="sliderForm" class="widget-box widget-color-dark user-form" method="POST" action="{{route('admin.banner.update')}}">
                        @csrf

                        <div class="form-group">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Image (Size: 2000px x 1331px)</label>
                                <input type="file" class="filepond" name="photo" minAllowedHeight='1331' >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mb-1">
                                <div class="d-inline-block">
                                    <label class="form-label" for="first-name-column">Heading 1 </label>
                                    | Choose Color : <input type="color" id="h1_color" name="h1_color" style="width: 24px; height: 20px;">
                                </div>
                                <input type="text" id="h1" class="form-control" placeholder="Heading 1" name="h1">
                            </div>
                        </div>

                        <div class="form-group showable">
                            <div class="mb-1">
                                <div class="d-inline-block">
                                    <label class="form-label" for="first-name-column">Heading 2 </label>
                                    | Choose Color : <input type="color" id="h2_color" name="h2_color" style="width: 24px; height: 20px;">
                                </div>
                                <input type="text" id="h2" class="form-control" placeholder="Heading 2" name="h2">
                            </div>
                        </div>

                        <div class="form-group showable">
                            <div class="mb-1">
                                <div class="d-inline-block">
                                    <label class="form-label" for="first-name-column">Heading 3 </label>
                                    | Choose Color : <input type="color" id="h3_color" name="h3_color" style="width: 24px; height: 20px;">
                                </div>
                                <input type="text" id="h3" class="form-control" placeholder="Heading 3" name="h3">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Link</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">{{request()->getSchemeAndHttpHost()}}</span>
                                    <input type="text" class="form-control" id="link" name="link" aria-describedby="basic-addon3">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mb-1">
                                <div class="d-inline-block">
                                    <label class="form-label" for="first-name-column">Buttton Text</label>
                                    | Choose Text Color : <input type="color" id="btn_text_color" name="btn_text_color" style="width: 24px; height: 20px;">
                                    <span class="showable">| Choose Background Color : </span> <input type="color" class="showable" id="btn_bg_color" name="btn_bg_color" style="width: 24px; height: 20px;">
                                </div>
                                <input type="text" id="btn_text" class="form-control" placeholder="Buttton Text" name="btn_text">
                            </div>
                        </div>

                        <div class="form-group showable">
                            <div class="mb-1">
                                <div class="d-inline-block">
                                    <label class="form-label" for="first-name-column">Description </label>
                                    | Choose Color : <input type="color" id="description_color" name="description_color" style="width: 24px; height: 20px;">
                                </div>

                               <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Status</label>
                                <select name="status" id="status" class="select2 form-select">
                                    <option value="1" selected>Active</option>
                                    <option value="0" >Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <button type="submit" class="btn btn-rounded btn-success btn-sm rounded" id="btn-save" > <i class="fas fa-save"></i> Save </button>
                        </div>
                    </form>

                </div>

                <div class="loader_container" id="form_loader" style="display:none">
                    <div class="loader"></div>
                </div>

            </div>
        </div>
    </div>

@endsection


@push('script')
    @include('scripts.backend.setting.bannerjs')
@endpush
