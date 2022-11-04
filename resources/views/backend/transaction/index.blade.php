@extends('backend.layouts.app')

@section('title', 'Transactions')
@section('home_url', route('transaction.index'))
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
                                            <table class="datatable table">
                                                <thead>
                                                    <tr>
                                                        <th>Sr#</th>
                                                        <th>Customer</th>
                                                        <th>Order</th>
                                                        <th>Payment Method</th>
                                                        <th>Payment Status</th>
                                                        <th>Created At</th>
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
    @include('scripts.backend.transaction.indexjs')
@endpush
