@extends('frontend.layouts.master') 
@section('title','PAYMENT')
@section('content')

<div class="container-fluid payment_page_des">
    <div class="container payment_page_content">
        <h2 class="page_title">Payment</h2>
    </div>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="cart" class="container table-responsive">
        <table class="table" id="cart_table">
            <thead>
                <tr>
                    <th class="productname">商品確認</th>
                    <th class="unitprice">單價</th>
                    <th class="quantity">數量</th>
                    <th class="price">金額</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td class="product_info">
                        <div class="product_img d-inline-block">
                            <a href="{{route('products.detail',$product['item']['id'])}}">
                                <img src="{{asset('uploads/product/' . $product['item']['image'] )}}">
                            </a>
                        </div>
                        <div class="product_text d-none d-md-inline-block pl-5">
                            <div class="product_name">
                                {{ $product['item']['name'] }}
                            </div>
                            <hr>
                            <div class="product_description">
                                {!! $product['item']['description'] !!}
                            </div>
                            
                        </div>
                    </td>
                    
                    <td class="product_price"> {{ $product['item']['price'] }}</td>
                    <td class="product_quantity">
                        {{$product['qty']}}   
                    </td>
                    <td class="product_totalprice">{{ $product['price'] }}</td>
                </tr>			
                @endforeach
                
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="total">
                        <p class="total_price">商品合計 <strong class="priceval">{{ $totalPrice }}</strong></p>
                    </th>
                </tr>
            </tfoot>
        </table>
    <hr>
    </div>
    <div class="container" id="cart-payment">
        <h5>Payment Details</h5>
        
        <form action="{{(route('cart.checkout'))}}" method="post" id="payment-form">
            @csrf
            <div class="form-group">
                <label for="name" class="col-form-label text-md-left">{{ __('Name on Card ') }}</label>
                <div>                       
                    <input id="name_on_card" type="text" class="form-control{{ $errors->has('name_on_card') ? ' is-invalid' : '' }}" name="name_on_card" value="{{ old('name_on_card') }}" >
                </div>
            </div>
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
        
            <button class="btn btn-success">Submit Payment</button>
        </form>
    </div>

</div>
@endsection
@section('link')
    <script src="https://js.stripe.com/v3/" data-locale="us"></script>
    <script src="{{asset('js/payment.js')}}"></script>
@endsection