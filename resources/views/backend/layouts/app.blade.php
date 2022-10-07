<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" href="{{asset('backend/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/forms/select/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/extensions/toastr.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/themes/semi-dark-layout.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/plugins/charts/chart-apex.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/plugins/extensions/ext-component-toastr.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/plugins/forms/form-quill-editor.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/filepond/dist/filepond.min.css">
    <!-- END: Custom CSS-->

    @stack('style')

</head>

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
    <!-- BEGIN: Header-->
    @include('backend.layouts.navbar')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('backend.layouts.sidebar')
    <!-- END: Main Menu-->



    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            @if (request()->path() != 'admin/dashboard')
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">@yield('title')</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="@yield('home_url')">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">@yield('page')</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endif

            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    {{Session::get('success')}}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif (Session::has('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    {{Session::get('danger')}}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            @yield('content')
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Footer-->
    @include('backend.layouts.footer')
    <!-- END: Footer-->

    @stack('script')
</body>
<!-- END: Body-->

</html>
