@extends('user.layouts.app')

@section('usercontent')
    <!-- Heading -->
    <!-- Heading -->
    <h6 class="mb-7">
        Add Debit / Credit Card
      </h6>

      <!-- Form -->
      <form action="{{route('payment.update',[$payment->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label class="form-label" for="cardNumber">Card Number *</label>
              <input class="form-control" id="cardNumber" type="text" name="card_no" value="{{$payment->card_no}}" placeholder="Card Number" required>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label class="form-label" for="nameOnCard">Name on Card *</label>
              <input class="form-control" id="nameOnCard" type="text" name="title" value="{{$payment->title}}" placeholder="Name on Card" required>
            </div>
          </div>
          <div class="col-12">

            <!-- Label -->
            <label class="form-label">
              Expiry Date *
            </label>

          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label class="visually-hidden" for="paymentMonth">Month</label>
              <select class="form-select" id="paymentMonth" required name="month">
                <option selected disabled value="">Month *</option>
                <option value="jan" {{$payment->month == 'jan' ? 'selected' : ''}}>January</option>
                <option value="feb" {{$payment->month == 'feb' ? 'selected' : ''}}>February</option>
                <option value="mar" {{$payment->month == 'mar' ? 'selected' : ''}}>March</option>
                <option value="apr" {{$payment->month == 'apr' ? 'selected' : ''}}>April</option>
                <option value="may" {{$payment->month == 'may' ? 'selected' : ''}}>May</option>
                <option value="jun" {{$payment->month == 'jun' ? 'selected' : ''}}>June</option>
                <option value="jul" {{$payment->month == 'jul' ? 'selected' : ''}}>July</option>
                <option value="aug" {{$payment->month == 'aug' ? 'selected' : ''}}>August</option>
                <option value="sep" {{$payment->month == 'sep' ? 'selected' : ''}}>September</option>
                <option value="oct" {{$payment->month == 'oct' ? 'selected' : ''}}>October</option>
                <option value="nov" {{$payment->month == 'nov' ? 'selected' : ''}}>November</option>
                <option value="dec" {{$payment->month == 'dec' ? 'selected' : ''}}>December</option>
              </select>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label class="visually-hidden" for="paymentCardYear" >Year</label>
              <select class="form-select" id="paymentCardYear" required name="year">
                <option selected disabled value="">Year *</option>
                @for ($i = 1980; $i <= date('Y'); $i++ )
                <option value="{{$i}}" {{$payment->year == $i ? 'selected' : ''}}>{{$i}}</option>
                @endfor
              </select>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              <div class="input-group input-group-merge">
                <input class="form-control" id="paymentCardCVV" type="text" placeholder="CVV *"  name="cvv" required value="{{$payment->cvv}}">
                <div class="input-group-append">
                  <span class="input-group-text" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="The CVV Number on your credit card or debit card is a 3 digit number on VISA, MasterCard and Discover branded credit and debit cards." data-bs-original-title="" title="">
                    <span><i class="fe fe-help-circle"></i></span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="defaultPaymentMethod" value="1" name="is_default" {{$payment->is_default == 1 ? 'checked' : ''}}>
                <label class="form-check-label" for="defaultPaymentMethod">Default payment method</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Button -->
        <button class="btn btn-dark" type="submit">
          Update Card
        </button>

      </form>

@endsection
