@extends('backend.layouts.master')
@section('title','NEWS-DIV | DETAIL')
@section('content')
<div class="container-fluid" id="newsdiv-detail">
    <div class="row">
        <div class="col-md-8 ">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Post Title:</h5>
                    <p class="card-text">{{ $news->title }}</p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Post Text</h5>
                    <textarea class="text" name="text" disabled>{{ $news->text }}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3 ">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    文章圖片
                </div>
                <div class="card-body">
                    <img class="preview border" src="{{ asset('uploads/newsdiv/' . $news->image) }}">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <a href="{{route('backend.news.newsdiv.index')}}" class="btn btn-secondary">Back</a>
        </div>   
    </div>



</div>
@endsection