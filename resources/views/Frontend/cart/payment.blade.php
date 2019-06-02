@extends('frontend.layouts.master') 
@section('title','PAYMENT')
@section('content')

<div class="container-fluid payment_page_des">
    <div class="container payment_page_content">
        <h2 class="page_title">Payment</h2>
    </div>
    <div class="container" id="cart-payment">
        
        <form action="/charge" method="post" id="payment-form">
            <script src="https://js.stripe.com/v3/"></script>
            <div class="form-group">
                <label for="card-element">
                    Credit or debit card
                </label>
            <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
            </div>
        
            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
            </div>
        
            <button class="btn btn-primary">Submit Payment</button>
        </form>
    </div>

</div>
@endsection