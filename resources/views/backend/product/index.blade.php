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
                                            <table class="datatable table table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Product</th>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th>Sub Category</th>
                                                        <th>Unit Price</th>
                                                        <th>Price</th>
                                                        <th>Discount</th>
                                                        <th>Quantity</th>
                                                        <th>Waitlist</th>
                                                        <th>Featured</th>
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
    @include('scripts.backend.product.indexjs')
@endpush
