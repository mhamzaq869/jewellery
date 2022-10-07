@extends('backend.layouts.app')

@section('title','Coupon')
@section('home_url',route('coupon.index'))
@section('page','Edit')

@section('content')
    <div class="content-body">
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Coupon</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{route('coupon.update',[$coupon->id])}}" method="Post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Code</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="e.g 10USDOFF" name="code" value="{{$coupon->code ?? ''}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12 my-1">
                                        <select name="type" class="select2 form-select" >
                                            <option value="1" {{$coupon->type == 1 ? 'slected' : ''}}>Fixed</option>
                                            <option value="2" {{$coupon->type == 2 ? 'slected' : ''}}>Percent</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Amount (USD)</label>
                                            <input type="number" id="first-name-column" class="form-control"
                                                placeholder="e.g $10.00" name="amount" value="{{$coupon->amount}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Status</label>
                                            <select name="status" class="select2 form-select " id="status">
                                                <option value="1" {{$coupon->type == 1 ? 'slected' : ''}}>Active</option>
                                                <option value="0" {{$coupon->type == 0 ? 'slected' : ''}}>Inctive</option>
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

