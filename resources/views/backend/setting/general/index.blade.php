@extends('backend.layouts.app')

@section('title', 'Profile')
@section('home_url', route('admin.dashboard'))
@section('page', 'Update')

@section('content')
    <div class="content-body">
        <section id="multiple-column-form">
            <form class="form" action="{{ route('admin.setting.update') }}" method="Post" id="productForm"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Logo</h4>
                            </div>
                            <div class="card-body">
                                <input type="file" class="filepond" name="logo">
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Favicon</h4>
                            </div>
                            <div class="card-body">
                                <input type="file" class="filepond_icon" name="favicon">
                            </div>
                        </div>


                    </div>


                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">General</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Site Name</label>
                                            <input type="text" class="form-control" name="name" value="{{$setting->name}}"/>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        @if (count($setting->decode_email) == 0)
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Email
                                                    <a class="ml-5" href="#" onclick="addEmailfield()">+ Add More</a>
                                                </label>
                                                <input type="email" class="form-control" name="email[]">
                                            </div>
                                            <div id="Email_new_field"></div>
                                        @else
                                            <div id="Email_new_field">
                                                @foreach ($setting->decode_email as $i => $email)
                                                <div class="mb-1">
                                                    @if ($i == 0)
                                                    <label class="form-label" for="first-name-column">Email
                                                        <a class="ml-5" href="#" onclick="addEmailfield()">+ Add More</a>
                                                    </label>
                                                    @endif
                                                    <input type="tel" class="form-control" name="email[]" value="{{$email}}">
                                                </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-6">
                                        @if (count($setting->decode_contact) == 0)
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Contact
                                                    <a class="ml-5" href="#" onclick="addPhonefield()">+ Add More</a>
                                                </label>
                                                <input type="tel" class="form-control" name="contact[]">
                                            </div>
                                            <div id="Phone_new_field"></div>
                                        @else
                                            <div id="Phone_new_field">
                                                @foreach ($setting->decode_contact as $i => $contact)
                                                <div class="mb-1">
                                                    @if ($i == 0)
                                                    <label class="form-label" for="first-name-column">Contact
                                                        <a class="ml-5" href="#" onclick="addPhonefield()">+ Add More</a>
                                                    </label>
                                                    @endif
                                                    <input type="tel" class="form-control" name="contact[]" value="{{$contact}}">
                                                </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">About Website</label>
                                            <textarea name="about" class="form-control" id="" cols="30" rows="5">{!! $setting->about !!}</textarea>
                                        </div>
                                    </div>

                                    <h4 class="card-title mt-3">Social Links</h4>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Facebook</label>
                                            <input type="url" class="form-control" name="facebook"
                                                placeholder="e.g https://www.facebook.com/" value="{{$setting->facebook}}"/>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Instagram</label>
                                            <input type="url" class="form-control" name="instagram"
                                                placeholder="e.g https://www.instagram.com/" value="{{$setting->instagram}}"/>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Twitter</label>
                                            <input type="url" class="form-control" name="twitter"
                                                placeholder="e.g https://twitter.com/" value="{{$setting->twitter}}"/>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Flickr</label>
                                            <input type="url" class="form-control" name="flickr"
                                                placeholder="e.g https://flickr.com/"  value="{{$setting->flickr}}"/>
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
        function addEmailfield() {
            $('#Email_new_field').append(`<div class="input-group mb-1">
                    <input type="email" class="form-control" name="email[]">
                    <button class="btn border-danger text-danger" onclick="console.log(this.parentElement.remove())" type="button">
                        X
                    </button>
            </div>`);
        }

        function addPhonefield() {
            $('#Phone_new_field').append(`<div class="input-group mb-1">
                    <input type="tel" class="form-control" name="contact[]">
                    <button class="btn border-danger text-danger" onclick="console.log(this.parentElement.remove())" type="button">
                        X
                    </button>
            </div>`);
        }

        var photo = "{{ $setting->logo != null ? asset($setting->logo) : ''}}"
        const pond = FilePond.create(document.querySelector('.filepond'), { name: 'logo'});
        if (photo != '') {
            pond.addFiles(photo);
        }


        FilePond.create(document.querySelector('.filepond_icon'));
        var favicon = "{{ $setting->favicon != null ? asset($setting->favicon) : ''}}"
        const faviconPond = FilePond.create(document.querySelector('.filepond_icon'), {name: 'favicon'});

        if (favicon != '') {
            faviconPond.addFiles(favicon);
        }
    </script>
@endpush
