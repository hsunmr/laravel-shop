@extends('frontend.layouts.master') 
@section('title','HOME')
@section('index_wrapper')
    <div id="wrapper" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner image-wrapper">
        @foreach ($carousels as $carousel)
            @if ($loop->first)
                <div class="carousel-item active">
                    <div class="hero-item" style="background-image: url('{{asset('uploads/carousel/' . $carousel->image_name)}}'); "></div>
                </div>
            @endif
            <div class="carousel-item">
                <div class="hero-item" style="background-image: url('{{asset('uploads/carousel/' . $carousel->image_name)}}'); "></div>
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
                @foreach ($newss as $news)
                <li>
                    <time>{{$news->created_at->format('Y年m月d日')}}</time>
                    <br class="break">
                    <span class="news_text"><a href="{{route('news.detail',$news->id)}}">{{$news->title}}</a></span>
                </li> 
                @endforeach			
           </ul>
    </div>
    <div class="row news_more">
        <p><a href="{{route('news')}}">more</a></p>
    </div>
  </div>
@endsection
    
