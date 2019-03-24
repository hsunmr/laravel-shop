@extends('frontend.layouts.master') 
@section('title','HOME')
@section('index_wrapper')
    <div id="wrapper" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner image-wrapper">
        @foreach ($carousels as $carousel)
            @if ($loop->first)
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('uploads/carousel/' . $carousel->image_name)}}" alt="First slide">
                </div>
            @endif
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('uploads/carousel/' . $carousel->image_name)}}" alt="First slide">
            </div>
        @endforeach
        </div>
    </div>
@endsection
@section('content')
 {{-- index bg carousel --}}
 
  <div class="container" id="index-about">
    <h2 class="head_title">ABOUT</h2>
       @foreach ($aboutdivs as $aboutdiv)            
        <div class="row about-des">
            @if($loop->index % 2 == 0)
                <div class="col-lg-6">
                    <div id="about-img">
                        <img class="d-block w-100"src="{{asset('uploads/aboutdiv/' . $aboutdiv->image)}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-word">
                        {!!$aboutdiv->text!!}
                    </div>
                </div>      
            @else
                <div class="col-lg-6">
                    <div class="about-title">
                        <h5>{{$aboutdiv->title}}</h5>
                    </div>
                    <div class="about-word">
                        {!!$aboutdiv->text!!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="about-img">
                        <img class="d-block w-100"src="{{asset('uploads/aboutdiv/' . $aboutdiv->image)}}">
                    </div>
                </div>     
            @endif
        </div>
        @endforeach  
    
  </div>
  <div class="container" id="index-news">
    <h2 class="head_title">NEWS</h2>
    <div class="row news-des">
            <ul id="news_topics">			
                 <li>
                    <time>2018年08月01日</time>
                    <br class="break">
                    <span class="news_text"><a href="#">news1</a></span>
                </li>
                <li>
                    <time>2018年08月01日</time>	
                    <br class="break">
                    <span class="news_text"><a href="/#">news2</a></span>
                </li>
                <li>
                    <time>2018年07月20日</time>
                    <br class="break">
                    <span class="news_text"><a href="#">news3</a></span>
                </li>
                <li>
                    <time>2018年07月20日</time>
                    <br class="break">
                    <span class="news_text"><a href="#">news4</a></span>
                </li>
                <li>
                    <time>2018年05月31日</time>
                    <br class="break">
                    <span class="news_text"><a href="#">news5</a></span>
                </li>
           </ul>
    </div>
    <div class="row news_more">
        <p><a href="{{route('news')}}">more</a></p>
    </div>
  </div>
@endsection
    
