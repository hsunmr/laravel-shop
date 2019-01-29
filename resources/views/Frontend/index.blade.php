@extends('frontend.layouts.master') {{-- pass var  to determine header bg whether exist  --}}
@section('title','HOME')
@section('index_wrapper')
    <div id="wrapper" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner image-wrapper">
            <div class="carousel-item active">
                <img class="d-block w-100" src="../img/header_bg1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../img/header_bg2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../img/header_bg3.jpg" alt="Third slide">
            </div>
        </div>
    </div>
@endsection
@section('content')
 {{-- index bg carousel --}}
 
  <div class="container-fluid" style="border: 2px solid yellow">content</div>
@endsection
    
