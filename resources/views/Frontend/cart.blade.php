@extends('frontend.layouts.master') 
@section('title','CART')
@section('content')

<div class="container-fluid cart_page_des">
    <div class="container cart_page_content">
        <h2 class="page_title">Shop Cart</h2>
    </div>
    @if (Session::has('cart'))
    <div id="cart" class="container table-responsive">
        <table class="table" id="cart_table">
            <thead>
                <tr>
                    <th class="productname">商品</th>
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
                            <a href="#">
                                <img src="{{asset('uploads/product/' . $product['item']['image'] )}}">
                            </a>
                        </div>
                        <div class="product_text d-none d-md-inline-block pl-5">
                            <div class="product_name">
                                {{ $product['item']['name'] }}
                            </div>
                            <div class="product_description">
                                {!! $product['item']['description'] !!}
                            </div>
                            
                        </div>
                    </td>
                    
                    <td class="product_price"> {{ $product['item']['price'] }}</td>
                    <td class="product_quantity">
                        
                        <select class="form-control quantity" name="quantity" data-id="{{$product['item']['id']}}">
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i+1 == $product['qty'])
                                    <option selected value="{{$i+1}}">{{$i+1}}</option>
                                @else
                                    <option value="{{$i+1}}">{{$i+1}}</option>
                                @endif
                            @endfor
                        </select>
                        <button type="button" class="btn btn-danger mt-2 delete_button" data-id="{{$product['item']['id']}}">
                            <i class="far fa-trash-alt fa-fw"></i>
                        </button>
                        
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
    @else
        <div class="noproduct-cart">
            no product
        </div>
    @endif
   
</div>
@endsection