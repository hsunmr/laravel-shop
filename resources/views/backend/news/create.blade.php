@extends('backend.layouts.master')
@section('title','NEWS-DIV | CREATE')
@section('content')
<div class="container-fluid" id="newsdiv-create">
    <div class="row title">
        <div class="col content-title">
            <i class="fas fa-plus-circle fa-2x align-middle"></i>
            <span class="align-middle">New News Post</span>
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

    <form action="{{route('backend.news.newsdiv.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row ">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Post Title</h5>
                        <p class="card-text">The title of news</p>
                        <input type="text" name="title" class="form-control" placeholder="title">
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Post Text</h5>
                        <textarea class="text" name="text" ></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        εηδΈε³
                    </div>
                    <div class="card-body">
                        <input type="file" name="image" accept="image/*" class="form-control file-upload mb-3" id="image-create" >
                        <img class="preview border" src="">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">δΈε³</button>
                <a href="{{route('backend.news.newsdiv.index')}}" class="btn btn-secondary">Back</a>

            </div>   
        </div>

    </form>

</div>
@endsection