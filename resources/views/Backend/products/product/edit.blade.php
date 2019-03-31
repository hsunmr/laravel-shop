@extends('backend.layouts.master')
@section('title','PRODUCT | EDIT')
@section('content')
<div class="container-fluid" id="product-edit">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('backend.products.product.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8 ">
                <div class="card mb-3">
                    <div class="card-header bg-warning">Product Info:</div>
                    <div class="card-body">
                        <span >Product Name:</span>
                        <input type="text" name="name" class="form-control" value="{{$product->name}}" placeholder="name">
                        <span >Product Type:</span>
                        <select class="form-control" name="type" >
                            @foreach ($types as $type)
                                @if ($type->name == $product->type)
                                    <option selected>{{$type->name}}</option>
                                @else
                                    <option>{{$type->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <span >Product Price:</span>
                        <input type="text" name="price" class="form-control" value="{{$product->price}}" placeholder="price">
                    </div>
                </div>       
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Post Text</h5>
                        <textarea id="description" name="description">{{$product->description}}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 ">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        圖片上傳
                    </div>
                    <div class="card-body">
                        <input type="file" name="image" accept="image/*" class="form-control file-upload mb-3" id="image-create" >
                        <img class="preview border" src="{{ asset('uploads/product/' . $product->image) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">更新</button>
                <a href="{{route('backend.products.product.index')}}" class="btn btn-secondary">Back</a>
            </div>   
        </div>

    </form>

</div>
@endsection