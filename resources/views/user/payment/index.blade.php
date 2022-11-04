@extends('user.layouts.app')

@section('usercontent')

<div class="row">
    @foreach ($payments as $payment)
    <div class="col-12 col-lg-6" id="payment_{{$payment->id}}">

      <!-- Card -->
      <div class="card card-lg bg-light mb-8">
        <div class="card-body">

          <!-- Heading -->
          <h6 class="mb-6">
            Debit / Credit Card
          </h6>

          <!-- Text -->
          <p class="mb-5">
            <strong>Card Number:</strong> <br>
            <span class="text-muted">{{substr($payment->card_no, 0,4)}} ∙∙∙∙ ∙∙∙∙ {{substr($payment->card_no, -4)}} (Mastercard)</span>
          </p>

          <!-- Text -->
          <p class="mb-5">
            <strong>Expiry Date:</strong> <br>
            <span class="text-muted">{{ucfirst(Str::substr($payment->month, 0, 3))}} {{$payment->year}}</span>
          </p>

          <!-- Text -->
          <p class="mb-0">
            <strong>Name on Card:</strong> <br>
            <span class="text-muted">{{$payment->title}}</span>
          </p>

          <!-- Action -->
          <div class="card-action card-action-end">

            <!-- Button -->
            <a class="btn btn-xs btn-circle btn-white-primary" href="{{route('payment.edit',[$payment->id])}}">
              <i class="fe fe-edit-2"></i>
            </a>

            <!-- Button -->
            <button class="btn btn-xs btn-circle btn-white-primary" onclick="removePayment({{$payment->id}})">
              <i class="fe fe-x"></i>
            </button>

          </div>

        </div>
      </div>

    </div>
    @endforeach
    <div class="col-12">

      <!-- Button -->
      <a class="btn w-100 btn-lg btn-outline-border" href="{{route('payment.create')}}">
        Add Payment Method <i class="fe fe-plus"></i>
      </a>

    </div>
  </div>
@endsection

@push('script')
    @include('scripts.user.payment_methodjs')
@endpush
