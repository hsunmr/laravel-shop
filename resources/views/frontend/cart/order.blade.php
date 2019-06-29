@extends('frontend.layouts.master') 
@section('title','ORDER')
@section('content')
<div class="container-fluid order_page_des">
    <div class="container order_page_content">
        <h2 class="page_title">Customer Info</h2>
    </div>
    <div class="container" id="cart-customer"> 
        <div class="card" >
            <div class="card-header">
                輸入訂購資料
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('cart.order.confirm',Auth::user()->id) }}">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label text-md-left">{{ __('電子郵件信箱 ') }}<font style="color:red">*</font></label>

                        <div class="col-md-9">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label text-md-left">{{ __('姓名 ') }}<font style="color:red">*</font></label>

                        <div class="col-md-4">                       
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
            
                    </div>
                    <div class="form-group row">
                        <label for="zip_cd" class="col-md-3 col-form-label text-md-left">{{ __('郵遞區號 ') }}<font style="color:red">*</font></label>

                        <div class="col-md-3">
                            <input id="zip_cd" type="text" class="form-control{{ $errors->has('zip_cd') ? ' is-invalid' : '' }}" name="zip_cd" value="{{ old('zip_cd') }}" maxlength="5" required>

                            @if ($errors->has('zip_cd'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('zip_cd') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-md-3 col-form-label text-md-left">{{ __('地址') }}<font style="color:red">*</font></label>

                        <div class="col-md-9">
                            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>
                        </div>
                        @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>   
                    
                    <div class="form-group row">
                        <label for="tel" class="col-md-3 col-form-label text-md-left">{{ __('手機/電話號碼 ') }}<font style="color:red">*</font></label>

                        <div class="col-md-6">
                            <input id="tel" type="tel" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" maxlength="12" required>

                            @if ($errors->has('tel'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tel') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>   
                    <div class="form-group row mb-0">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn w-25" id="order_button">
                                {{ __('結帳') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

    </div>
</div>
@endsection