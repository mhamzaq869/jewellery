@extends('backend.layouts.app')

@section('title', 'Products')
@section('home_url', route('product.index'))
@section('page', ' ')

@section('content')

    <div class="content-body">
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Basic table -->
                            <section id="basic-datatable">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="homeIcon-tab" data-bs-toggle="tab" href="#homeIcon" aria-controls="home" role="tab" aria-selected="true"> All Reviews</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profileIcon-tab" data-bs-toggle="tab" href="#profileIcon" aria-controls="profile" role="tab" aria-selected="false">Pending</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="aboutIcon-tab" data-bs-toggle="tab" href="#aboutIcon" aria-controls="about" role="tab" aria-selected="false">Approved</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
                                                    <table class="datatable table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Product</th>
                                                                <th>Product Title</th>
                                                                <th>Customer</th>
                                                                <th>Email</th>
                                                                <th>Review Title</th>
                                                                <th>Rating</th>
                                                                <th>Review</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane" id="profileIcon" aria-labelledby="profileIcon-tab" role="tabpanel">
                                                    <table class="pending-datatable table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Product</th>
                                                                <th>Product Title</th>
                                                                <th>Customer</th>
                                                                <th>Email</th>
                                                                <th>Review Title</th>
                                                                <th>Rating</th>
                                                                <th>Review</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane" id="aboutIcon" aria-labelledby="aboutIcon-tab" role="tabpanel">
                                                    <table class="approve-datatable table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Product</th>
                                                                <th>Product Title</th>
                                                                <th>Customer</th>
                                                                <th>Email</th>
                                                                <th>Review Title</th>
                                                                <th>Rating</th>
                                                                <th>Review</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </section>
                            <!--/ Basic table -->


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    @include('scripts.backend.review.indexjs')
@endpush
