@extends('backend.layouts.app')

@section('title', 'Category')
@section('home_url', route('category.index'))
@section('page', 'Create')

@section('content')
    <div class="content-body">
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Category</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{ route('category.store') }}" method="Post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Parent Category</label>
                                            <select name="parent_id" class="form-control select2">
                                                <option value="" selected> Parent Category</option>
                                                @foreach ($parents as $parent)
                                                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
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
                                                placeholder="Name" name="name">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Brands</label>
                                            <select name="brand_id" class="form-control select2">
                                                <option value="" selected>Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
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
                                                <option value="1">Active</option>
                                                <option value="0">Inctive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-2">
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
