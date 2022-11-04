@extends('backend.layouts.app')

@section('title', 'Profile')
@section('home_url', route('admin.dashboard'))
@section('page', 'Update')

@section('content')
    <div class="content-body">
        <section id="multiple-column-form">
            <form class="form" action="{{ route('admin.profile.update') }}" method="Post" id="productForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="card ">
                            <div class="card-body">
                                <input type="file" class="filepond" name="photo" >
                            </div>
                        </div>
                    </div>


                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Profile</h4>
                            </div>
                            <div class="card-body">

                                    <div class="row">

                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">First Name</label>
                                                <input type="text" class="form-control" name="first_name" value="{{Auth::user()->first_name ?? ''}}">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Last Name</label>
                                                <input type="text" class="form-control" name="last_name" value="{{Auth::user()->last_name ?? ''}}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Email</label>
                                                <input type="email" class="form-control" name="email" value="{{Auth::user()->email ?? ''}}">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Current Password</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">New Password</label>
                                                <input type="password" class="form-control" name="new_password">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Gender</label>
                                                <select name="gender" class="select2 form-select">
                                                    <option value="male" {{Auth::user()->gender == 'male' ? 'selected' : ''}}>Male</option>
                                                    <option value="female" {{Auth::user()->gender == 'female' ? 'selected' : ''}}>Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-2">
                                            <button type="submit"
                                                class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

@push('script')
    <script>
        var photo = "{{Auth::user()->photo != null ? asset(Auth::user()->photo) : ''}}"
        const pond = FilePond.create(document.querySelector('.filepond'),{
            name: 'photo',
        });
        if(photo != ""){
            pond.addFiles(photo);
        }

    </script>
@endpush
