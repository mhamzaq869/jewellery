@extends('user.layouts.app')

@section('usercontent')
    <!-- Heading -->
    <!-- Heading -->
    <h6 class="mb-7">
        Add Debit / Credit Card
      </h6>

      <!-- Form -->
      <form action="{{route('payment.store')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label class="form-label" for="cardNumber">Card Number *</label>
              <input class="form-control" id="cardNumber" type="text" name="card_no" placeholder="Card Number" required>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label class="form-label" for="nameOnCard">Name on Card *</label>
              <input class="form-control" id="nameOnCard" type="text" name="title" placeholder="Name on Card" required>
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
                <option value="jan">January</option>
                <option value="feb">February</option>
                <option value="mar">March</option>
                <option value="apr">April</option>
                <option value="may">May</option>
                <option value="jun">June</option>
                <option value="jul">July</option>
                <option value="aug">August</option>
                <option value="sep">September</option>
                <option value="oct">October</option>
                <option value="nov">November</option>
                <option value="dec">December</option>
              </select>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label class="visually-hidden" for="paymentCardYear" >Year</label>
              <select class="form-select" id="paymentCardYear" required name="year">
                <option selected disabled value="">Year *</option>
                @for ($i = 1980; $i <= date('Y'); $i++ )
                <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              <div class="input-group input-group-merge">
                <input class="form-control" id="paymentCardCVV" type="text" placeholder="CVV *"  name="cvv" required>
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
                <input type="checkbox" class="form-check-input" value="1" id="defaultPaymentMethod" name="is_default">
                <label class="form-check-label" for="defaultPaymentMethod">Default payment method</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Button -->
        <button class="btn btn-dark" type="submit">
          Add Card
        </button>

      </form>

@endsection
