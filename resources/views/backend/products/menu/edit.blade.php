@extends('backend.layouts.master')
@section('title','MENU | EDIT')
@section('content')
<div class="container-fluid" id="menu-edit">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('backend.products.menu.update',$menu->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row tb-2">
            <div class="col-md-8 ">
                <div class="card mb-3">
                    <div class="card-header bg-warning">Product Info:</div>
                    <div class="card-body">
                        <span >Product Name:</span>
                        <input type="text" name="name" class="form-control" value="{{$menu->name}}" placeholder="name">
                        <span >Product Type:</span>
                        <select class="form-control" name="type" >
                            @foreach ($types as $type)
                                @if ($type->name == $menu->type)
                                    <option selected>{{$type->name}}</option>
                                @else
                                    <option>{{$type->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <span >Product Price:</span>
                        <input type="text" name="price" class="form-control" value="{{$menu->price}}" placeholder="price">
                    </div>
                </div>       
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Post Text</h5>
                        <textarea id="description" name="description">{{$menu->description}}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 ">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        ????????????
                    </div>
                    <div class="card-body">
                        <input type="file" name="image" accept="image/*" class="form-control file-upload mb-3" id="image-create" >
                        <img class="preview border" src="{{ asset('uploads/menu/' . $menu->image) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">??????</button>
                <a href="{{route('backend.products.menu.index')}}" class="btn btn-secondary">Back</a>
            </div>   
        </div>

    </form>

</div>
@endsection