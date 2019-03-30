@extends('backend.layouts.master')
@section('title','NEWS-DIV | EDIT')
@section('content')
<div class="container-fluid" id="newsdiv-edit">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('backend.news.newsdiv.update',$news->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8 ">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Post Title</h5>
                        <p class="card-text">The title of news</p>
                        <input type="text" name="title" class="form-control" value="{{$news->title}}" placeholder="title">
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Post Text</h5>
                        <textarea class="text" name="text">{{$news->text}}</textarea>
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
                        <img class="preview border" src="{{ asset('uploads/newsdiv/' . $news->image) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">更新</button>
                <a href="{{route('backend.news.newsdiv.index')}}" class="btn btn-secondary">Back</a>
            </div>   
        </div>

    </form>

</div>
@endsection