@extends('frontend.layouts.master') 
@section('title','ABOUT')
@section('content')
<div class="container" id="about_page_content">
    <div class="about_page_des">
        <h2 class="page_title">ABOUT</h2>
        @foreach ($introdivs as $intro)
        <div class="row about_page_img">
            <div class="col">
                <img class="d-block w-100 rounded" src="{{asset('uploads/introdiv/' . $intro->image)}}">
            </div>
        </div>
        <div class="row about_page_word">
            <div class="col">
                {!!$intro->text!!}
            </div>
        </div>
        @endforeach
        
    </div>

<div class="container" id="about_page_history">
    <h2 class="page_title">History</h2>
    <div class="row about_history_des">
        <ul>
            @foreach ($historys as $history)
            <li>
                <time>{{$history->created_at->format('Y年m月d日')}}</time>
                <br class="break">
                <span class="history_text">{{$history->text}}</a></span>
            </li> 
            @endforeach		
        </ul>
    </div>
</div>
</div>   
@endsection