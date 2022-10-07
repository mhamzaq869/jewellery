@extends('backend.layouts.app')

@section('title','Shipping')
@section('home_url',route('shipping.index'))
@section('page','Create')

@section('content')
    <div class="content-body">
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Shipping</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{route('shipping.store')}}" method="Post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Name</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Name" name="name">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12 my-1">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input shipping_check" type="radio" name="type" id="Free" value="free">
                                            <label class="form-check-label" for="Free">Free Shipping</label>
                                        </div>
                                        <br>

                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input shipping_check" type="radio" name="type" id="flat_shipping_check" value="flat">
                                            <label class="form-check-label" for="flat_shipping_check">Flat Shipping</label>
                                        </div>

                                        <div class="mt-1 d-none" id="flat_shipping" >
                                            <label class="form-label" for="first-name-column">Amount (USD)</label>
                                            <input type="number" name="amount" class="form-control" min="1" value="1">
                                        </div>

                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Days</label>
                                            <input type="number" id="first-name-column" class="form-control"
                                                placeholder="Name" name="days">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Status</label>
                                            <select name="status" class="select2 form-select " id="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inctive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@push('script')
    <script>
         $(".shipping_check").on('click', function(){
            if($(this).val() == 'flat'){
                $("#flat_shipping").removeClass('d-none')
            }else{
                $("#flat_shipping").addClass('d-none')
            }
        });
    </script>
@endpush
