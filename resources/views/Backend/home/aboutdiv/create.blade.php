@extends('backend.layouts.master')
@section('title','ABOUT-DIV | CREATE')
@section('content')
<div class="container-fluid" id="aboutdiv-create">
    <div class="row tb-2">
        <div class="col content-title">
            <i class="fas fa-plus-circle fa-2x align-middle"></i>
            <span class="align-middle">New AboutDiv Posts</span>
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

    <form action="{{route('backend.home.aboutdiv.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row ">
            <div class="col-md-8 ">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Post Title</h5>
                        <p class="card-text">The title of aboutdiv</p>
                        <input type="text" name="title" class="form-control" placeholder="title">
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Post Text</h5>
                        <textarea class="text" name="text"></textarea>
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
                        <img class="preview border" src="">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">上傳</button>
                <a href="{{route('backend.home.aboutdiv.index')}}" class="btn btn-secondary">Back</a>

            </div>   
        </div>

    </form>

</div>
@endsection