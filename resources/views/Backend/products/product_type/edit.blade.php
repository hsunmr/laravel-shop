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
        <div class="row tb-2">
            <div class="col-md-8 ">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Type name</h5>
                        <input type="text" name="name" class="form-control" value="{{$type->name}}" placeholder="name">
                    </div>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Product Type Category</h5>
                        <input type="text" name="type" class="form-control" value="{{$type->type}}" placeholder="type">
                    </div>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Type order</h5>
                        <select class="form-control" name="order" >
                            @for ($i = 1; $i <= $types->count(); $i++)
                                @if ($type->order == $i)
                                    <option selected>{{$i}}</option>
                                @else
                                    <option>{{$i}}</option>
                                @endif
                            @endfor
                        </select>
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