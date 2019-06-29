@extends('backend.layouts.master')
@section('title','MENU | CREATE')
@section('content')
<div class="container-fluid" id="menu-create">
    <div class="row title">
        <div class="col content-title">
            <i class="fas fa-plus-circle fa-2x align-middle"></i>
            <span class="align-middle">New Menu Product</span>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('backend.products.menu.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row ">
            <div class="col-md-7">
                <div class="card mb-3">
                    <div class="card-header bg-warning">Product Info:</div>
                    <div class="card-body">
                        <span >Product Name:</span>
                        <input type="text" name="name" class="form-control" placeholder="name">
                        <span >Product Type:</span>
                        <select class="form-control" name="type" >
                            @foreach ($types as $type)
                                <option>{{$type->name}}</option>
                            @endforeach
                        </select>
                        <span >Product Price:</span>
                        <input type="text" name="price" class="form-control" placeholder="price">
                    </div>
                </div>       
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Product description</h5>
                        <textarea name="description" id="description"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-3 ">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        圖片上傳
                    </div>
                    <div class="card-body">
                        <input type="file" name="image" accept="image/*" class="form-control file-upload mb-3" id="image-create" >
                        <img class="preview border" src="">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">上傳</button>
                <a href="{{route('backend.products.menu.index')}}" class="btn btn-secondary">Back</a>

            </div>   
        </div>

    </form>

</div>
@endsection