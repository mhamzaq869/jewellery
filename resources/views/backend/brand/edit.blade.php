@extends('backend.layouts.app')

@section('title','Brand')
@section('home_url',route('brand.index'))
@section('page','Edit')

@section('content')
    <div class="content-body">
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Brand</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{route('brand.update',[$brand->id])}}" method="Post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Name</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Name" name="name" value="{{$brand->name}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Image</label>
                                            <input type="file" class="filepond" name="image" allowImageCrop="true"/>
                                        </div>
                                    </div>


                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Status</label>
                                            <select name="status" class="select2 form-select " id="status">
                                                <option value="1" {{$brand->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{$brand->status == 0 ? 'selected' : '' }}>Inctive</option>
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
        const pond = FilePond.create(document.querySelector('.filepond'),{
            name: 'image',
            files: [
                {
                    source: '{{ asset("$brand->image")}}',
                }
            ]
        });
    </script>
@endpush
