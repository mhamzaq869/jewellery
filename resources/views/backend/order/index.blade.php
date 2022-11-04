@extends('backend.layouts.app')

@section('title', 'Orders')
@section('home_url', route('order.index'))
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
                                                        <th>#Order Number</th>
                                                        <th>Customer</th>
                                                        <th>Shipping Address</th>
                                                        <th>Amount</th>
                                                        <th>Method</th>
                                                        <th>Status</th>
                                                        <th>Time</th>
                                                        <th>Action</th>
                                                        <th>More</th>
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
    @include('scripts.backend.order.indexjs')
@endpush
