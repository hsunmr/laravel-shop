@extends('backend.layouts.master')
@section('title','ABOUT-DIV | CREATE')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col content-title">
            <i class="fas fa-plus-circle fa-2x align-middle"></i>
            <span class="align-middle">New ABOUTDIV Posts</span>
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
                        <textarea class="ckeditor"name="post-text"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 ">
                    <div class="card">
                            <div class="card-header">
                              Featured
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">Special title treatment</h5>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
            </div>
           
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('backend.home.aboutdiv.index')}}" class="btn btn-success">Back</a>
                
            </div>
        </div>
    </form>

</div>
@endsection