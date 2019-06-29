@extends('frontend.layouts.master') 
@section('title','NEWS')
@section('content')
<div class="container" id="news_detail_content">
    <div class="news_detail_des">
        <time>{{$news->created_at->format('Y年m月d日')}}</time>
        <h3 class="post_title">{{$news->title}}</h2>
        <div class="row" id="post_img">
            <div class="col">
                <img class="d-block w-100" src="{{asset('uploads/newsdiv/' . $news->image)}}">
            </div>
        </div>
        <div class="row" id="post_text">
            <div class="col">
                <p>
                {!!$news->text!!}
                </p>
            </div>
        </div>
    </div>
    <div class="back_button">
        <a href="{{route('news')}}"><span>回到NEWS</span></a>
    </div>
</div>


@endsection