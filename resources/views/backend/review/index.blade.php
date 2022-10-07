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

                                                        <table class="allReviews table table-responsive">
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
                                                                    <th>Featured</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                </div>
                                                <div class="tab-pane" id="profileIcon" aria-labelledby="profileIcon-tab" role="tabpanel">
                                                    <p>
                                                        Dragée jujubes caramels tootsie roll gummies gummies icing bonbon. Candy jujubes cake cotton candy.
                                                        Jelly-o lollipop oat cake marshmallow fruitcake candy canes toffee. Jelly oat cake pudding jelly beans
                                                        brownie lemon drops ice cream halvah muffin. Brownie candy tiramisu macaroon tootsie roll danish.
                                                    </p>
                                                    <p>
                                                        Croissant pie cheesecake sweet roll. Gummi bears cotton candy tart jelly-o caramels apple pie jelly
                                                        danish marshmallow. Icing caramels lollipop topping. Bear claw powder sesame snaps.
                                                    </p>
                                                </div>
                                                <div class="tab-pane" id="disabledIcon" aria-labelledby="disabledIcon-tab" role="tabpanel">
                                                    <p>
                                                        Chocolate croissant cupcake croissant jelly donut. Cheesecake toffee apple pie chocolate bar biscuit
                                                        tart croissant. Lemon drops danish cookie. Oat cake macaroon icing tart lollipop cookie sweet bear claw.
                                                    </p>
                                                </div>
                                                <div class="tab-pane" id="aboutIcon" aria-labelledby="aboutIcon-tab" role="tabpanel">
                                                    <p>
                                                        Gingerbread cake cheesecake lollipop topping bonbon chocolate sesame snaps. Dessert macaroon bonbon
                                                        carrot cake biscuit. Lollipop lemon drops cake gingerbread liquorice. Sweet gummies dragée. Donut bear
                                                        claw pie halvah oat cake cotton candy sweet roll. Cotton candy sweet roll donut ice cream.
                                                    </p>
                                                    <p>
                                                        Halvah bonbon topping halvah ice cream cake candy. Wafer gummi bears chocolate cake topping powder.
                                                        Sweet marzipan cheesecake jelly-o powder wafer lemon drops lollipop cotton candy.
                                                    </p>
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
    {{-- @include('scripts.backend.product.indexjs') --}}
@endpush
