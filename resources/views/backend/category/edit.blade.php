@extends('backend.layouts.app')

@section('title', 'Category')
@section('home_url', route('category.index'))
@section('page', 'Edit')

@section('content')
    <div class="content-body">
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Category</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{ route('category.update',[$category->id]) }}" method="Post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Parent Category</label>
                                            <select name="parent_id" class="form-control select2">
                                                <option value="" selected> Parent Category</option>
                                                @foreach ($parents as $parent)
                                                    <option value="{{ $parent->id }}" {{$category->parent_id == $parent->id ? 'selected' : ''}}>{{ $parent->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('brand')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Name</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Name" name="name" value="{{$category->name ?? ''}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Brands</label>
                                            <select name="brand_id" class="form-control select2">
                                                <option disabled="disabled">--Select Brand--</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}" {{$category->brand_id == $brand->id ? 'selected' : ''}}>{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('brand')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>


                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Status</label>
                                            <select name="status" class="select2 form-select " id="status">
                                                <option value="1" {{$category->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{$category->status == 0 ? 'selected' : '' }}>Inctive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
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
