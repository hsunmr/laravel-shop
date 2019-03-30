@extends('backend.layouts.master')
@section('title','PRODUCT-TYPE | EDIT')
@section('content')
<div class="container-fluid" id="product_type-edit">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('backend.products.product-type.update',$type->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8 ">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Product Type</h5>
                        <p class="card-text">The type of product</p>
                        <input type="text" name="type" class="form-control" value="{{$type->type}}" placeholder="title">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">更新</button>
                <a href="{{route('backend.products.product-type.index')}}" class="btn btn-secondary">Back</a>
            </div>   
        </div>

    </form>

</div>
@endsection