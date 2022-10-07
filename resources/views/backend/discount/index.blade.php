@extends('backend.layouts.app')

@section('title', 'Discounts')
@section('home_url', route('discount.index'))
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
                                                        <th>Name</th>
                                                        <th>Type</th>
                                                        <th>Amount</th>
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
    @include('scripts.backend.discount.indexjs')
@endpush
