@extends('backend.layouts.master')
@section('title','FOOTER')
@section('content')
<div class="container-fluid" id="footer">
    <div class="row title" id="footer-title">
        <div class="col content-title">
            <i class="fas fa-download fa-3x align-middle"></i>
            <span class="align-middle">Footer</span>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
     @endif
    @if ($errors->any())
        <div id="error_msg" class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('backend.share.footer.update',$footer->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row" id="footer-content">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Footer Text:</h5>
                        <input type="text" name="footertext" class="form-control" value="{{$footer->footertext}}"placeholder="footer text">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">更新</button>
            </div>   
        </div>
    </form>
    
</div>
    
@endsection