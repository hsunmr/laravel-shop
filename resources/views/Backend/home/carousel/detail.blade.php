@extends('backend.layouts.master')
@section('title','Carousel | DETAIL')
@section('content')
    <div class="container-fluid" id="carousel-detail">
        <div class="row">
            
            <div class="col-md-12">
                <div class="form-group">
                    <h5>Name:</h5> 
                    {{$carousel->name}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <h5>Image:</h5>
                    <img src="{{ asset('uploads/carousel/' . $carousel->image_name) }}">
                </div>
            </div>
            <div class="col-md-12">
                <a href="{{route('backend.home.carousel.index')}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

@endsection