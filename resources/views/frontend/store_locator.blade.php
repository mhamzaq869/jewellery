@extends('layouts.app')

@section('content')
    <!-- BREADCRUMB -->
    @include('layouts.breadcrumb', ['page' => 'Store Locator'])

    <!-- HEADER -->
    <section class="pt-7 pb-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-6">

                    <!-- Heading -->
                    <h3 class="mb-10 text-center">Store Locator</h3>

                    <!-- Search -->
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="search" placeholder="Enter Country or City">
                        <div class="input-group-append">
                            <button class="btn btn-outline-border" type="submit">
                                <i class="fe fe-search"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- MAP -->
    <section class="py-12 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-4">

                    <!-- Card -->
                    <div class="card card-xl h-md-0 min-h-md-100 mb-10 mb-md-0 shadow" data-simplebar>
                        <div class="card-body">

                            <!-- Heading -->
                            <p class="fw-bold">
                                Baldwin Hills Crenshaw Plaza
                            </p>

                            <p class="text-gray-500">
                                Mönckebergstrasse 11
                                20095 Hamburg, Germany
                            </p>

                            <p>
                                <strong>Phone:</strong> <br>
                                <a class="text-gray-500" href="tel:6-146-389-574">6-146-389-574</a>
                            </p>

                            <p class="mb-0">
                                <strong>Store Hours:</strong> <br>
                                <span class="text-gray-500">10 am - 10 pm EST, 7 days a week</span>
                            </p>

                        </div>
                        <div class="card-body border-top">

                            <!-- Heading -->
                            <p class="fw-bold">
                                Stonewood Center
                            </p>

                            <p class="text-gray-500">
                                Largo Corsia Dei Servi 3
                                20122 Milan, Italy
                            </p>

                            <p>
                                <strong>Phone:</strong> <br>
                                <a class="text-gray-500" href="tel:6-146-389-574">6-146-389-574</a>
                            </p>

                            <p class="mb-0">
                                <strong>Store Hours:</strong> <br>
                                <span class="text-gray-500">10 am - 10 pm EST, 7 days a week</span>
                            </p>

                        </div>
                        <div class="card-body border-top">

                            <!-- Heading -->
                            <p class="fw-bold">
                                Shalyapin Palace
                            </p>

                            <p class="text-gray-500">
                                Block 5, 5th Floor, Harcourt Centre, Harcourt Road
                                Dublin, Ireland
                            </p>

                            <p>
                                <strong>Phone:</strong> <br>
                                <a class="text-gray-500" href="tel:6-146-389-574">6-146-389-574</a>
                            </p>

                            <p class="mb-0">
                                <strong>Store Hours:</strong> <br>
                                <span class="text-gray-500">10 am - 10 pm EST, 7 days a week</span>
                            </p>

                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-7 col-lg-8">

                    <!-- Map -->
                    <div class="ratio ratio-4x3">
                        <div class="ratio-item" data-map
                            data-markers='[{"position": [53.5508748,9.9985808], "info": "<div class=\"card card-sm\"><div class=\"card-body\"><p class=\"mb-2 fw-bold\">Baldwin Hills Crenshaw Plaza</p><p class=\"mb-3 text-gray-500\">Mönckebergstrasse 11 20095 Hamburg, Germany</p><p class=\"mb-1 fw-bold\">Phone:</p><p class=\"mb-3 text-grat-500\">6-146-389-574</p><p class=\"mb-1 fw-bold\">Store Hours:</p><p class=\"mb-0 text-grat-500\">10 am - 10 pm EST, 7 days a week</p></div>"}, {"position": [45.4646477,9.1935083], "info": "<div class=\"card card-sm\"><div class=\"card-body\"><p class=\"mb-2 fw-bold\">Stonewood Center</p><p class=\"mb-3 text-gray-500\">Largo Corsia Dei Servi 3 20122 Milan, Italy</p><p class=\"mb-1 fw-bold\">Phone:</p><p class=\"mb-3 text-grat-500\">6-146-389-574</p><p class=\"mb-1 fw-bold\">Store Hours:</p><p class=\"mb-0 text-grat-500\">10 am - 10 pm EST, 7 days a week</p></div>"}, {"position": [53.332769,-6.2663917], "info": "<div class=\"card card-sm\"><div class=\"card-body\"><p class=\"mb-2 fw-bold\">Shalyapin Palace</p><p class=\"mb-3 text-gray-500\">Block 5, 5th Floor, Harcourt Centre, Harcourt Road Dublin, Ireland</p><p class=\"mb-1 fw-bold\">Phone:</p><p class=\"mb-3 text-grat-500\">6-146-389-574</p><p class=\"mb-1 fw-bold\">Store Hours:</p><p class=\"mb-0 text-grat-500\">10 am - 10 pm EST, 7 days a week</p></div>"}]'>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
