@extends('backend.layouts.master')
@section('title','Carousel | EDIT')
@section('content')
    <div class="container-fluid" id="carousel-edit">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <form action="{{route('backend.home.carousel.update',$carousel->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <h5>Name:</h5> 
                        <input type="text" name="name" class="form-control" placeholder="Image Name" value="{{$carousel->name}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <h5>Image:</h5>
                        <input type="file" name="image_name" accept="image/*" class="form-control file-upload" id="img-update">
                    </div>     
                </div>
                <div class="col-md-12">
                    <img class="preview"src="{{ asset('uploads/carousel/' . $carousel->image_name) }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">更新</button>
                    <a href="{{route('backend.home.carousel.index')}}" class="btn btn-secondary">Back</a>
                </div>       
            </div>
        </form>
    </div>

@endsection