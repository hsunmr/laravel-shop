@extends('backend.layouts.master')
@section('title','HISTORY-DIV | EDIT')
@section('content')
<div class="container-fluid" id="history-edit">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('backend.about.historydiv.update',$history->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row tb-2">
            <div class="col-lg-8 ">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Post Title</h5>
                        <p class="card-text">The title of history</p>
                        <input type="text" name="title" class="form-control" value="{{$history->title}}" placeholder="title">
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Post Text</h5>
                        <p class="card-text">The text of history</p>
                        <input type="text" name="text" class="form-control" value="{{$history->text}}" placeholder="text">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">更新</button>
                <a href="{{route('backend.about.historydiv.index')}}" class="btn btn-secondary">Back</a>
            </div>   
        </div>

    </form>

</div>
@endsection