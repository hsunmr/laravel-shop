@extends('backend.layouts.master')
@section('title','ABOUT-DIV | DETAIL')
@section('content')
<div class="container-fluid" id="introdiv-detail">
    <div class="row">
        <div class="col-md-8 ">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Post Title:</h5>
                    <p class="card-text">{{ $introdiv->title }}</p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Post Text</h5>
                    <textarea class="text" name="text" disabled>{{ $introdiv->text }}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3 ">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    文章圖片
                </div>
                <div class="card-body">
                    <img class="preview border" src="{{ asset('uploads/introdiv/' . $introdiv->image) }}">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <a href="{{route('backend.about.introdiv.index')}}" class="btn btn-secondary">Back</a>
        </div>   
    </div>



</div>
@endsection