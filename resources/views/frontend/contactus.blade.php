@extends('layouts.app')

@section('content')
    <!-- BREADCRUMB -->
    @include('layouts.breadcrumb', ['page' => 'Contact Us'])

    <section class="pt-7 pb-12">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Heading -->
                    <h3 class="mb-10 text-center">Contact Us</h3>

                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-12 col-md-4 col-xl-3">
                    <aside class="mb-9 mb-md-0">

                        <!-- Heading -->
                        <h6 class="mb-6">
                            <i class="fe fe-phone text-primary me-4"></i> Call to Us:
                        </h6>

                        <!-- Text -->
                        <p class="text-gray-500">
                            We're available 7 days a week.
                        </p>
                        <p>
                            <strong>Customer Service:</strong><br>
                            @foreach ($site_setting->decode_contact as $contact)
                            <a class="text-gray-500" href="tel:{{$contact}}">{{$contact}}</a> <br>
                            @endforeach
                        </p>


                        <!-- Divider -->
                        <hr>

                        <!-- Heading -->
                        <h6 class="mb-6">
                            <i class="fe fe-mail text-primary me-4"></i> Write to Us:
                        </h6>

                        <!-- Text -->
                        <p class="text-gray-500">
                            Fill out our form and we will contact you.
                        </p>
                        <p>
                            <strong>Customer Service:</strong><br>
                            @foreach ($site_setting->decode_email as $email)
                            <a class="text-gray-500" href="mailto:{{$email}}">{{$email}}</a><br>
                            @endforeach
                        </p>


                    </aside>
                </div>

                <div class="col-12 col-md-8">
                    @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <!-- Text -->
                        {{Session::get('success')}}
                        <!-- Button -->
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    <!-- Form -->
                    <form method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
                        @csrf
                        <!-- Email -->
                        <div class="form-group">
                            <label class="visually-hidden" for="contactName">
                                Your Name *
                            </label>
                            <input class="form-control form-control-sm" name="name" id="contactName" type="text"
                                placeholder="Your Name *" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label class="visually-hidden" for="contactEmail">
                                Your Email *
                            </label>
                            <input class="form-control form-control-sm" name="email" id="contactEmail" type="email"
                                placeholder="Your Email *" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label class="visually-hidden" for="contactTitle">
                                Title *
                            </label>
                            <input class="form-control form-control-sm" name="subject" id="contactTitle" type="text"
                                placeholder="Title *" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-7">
                            <label class="visually-hidden" for="contactMessage">
                                Message *
                            </label>
                            <textarea class="form-control form-control-sm" name="message" id="contactMessage" rows="5" placeholder="Message *" required></textarea>
                        </div>

                        <!-- Button -->
                        <button class="btn btn-dark" type="submit">
                            Send Message
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
