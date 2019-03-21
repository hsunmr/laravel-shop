@extends('backend.layouts.master')
@section('title','Carousel | CREATE')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3>New Carousel Image</h3>
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

    <form action="{{route('backend.home.carousel.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row ">
            <div class="col-md-12 mb-3">
                <strong>圖片名稱 :</strong>
                <input type="text" name="name" class="form-control" placeholder="Image Name">
            </div>
            <div class="col-md-12 mb-3">
                <strong>上傳圖片 :</strong>
                <input type="file" name="image_name" class="form-control file-upload" >
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                <a href="{{route('backend.home.carousel.index')}}" class="btn btn-sm btn-success">Back</a>
                
            </div>
        </div>
    </form>

</div>
@endsection