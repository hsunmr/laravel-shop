@extends('frontend.layouts.master') 
@section('title','NEWS')
@section('content')
<div class="container" id="news_page_content">
    <div class="news_page_des">
        <h2 class="page_title">NEWS</h2>
        <div class="news_page_text">
            <ul>			
                <li>
                    <time>2019年2月19日</time>
                    <br>
                    <a href="{{route('news_detail')}}"><span>OPENnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaannn</span></a>
                </li>
                <li>
                    <time>2019年2月19日</time>
                    <br>
                    <a href="#"><span>OPEN</span></a>
                </li>
            </ul>
         </div>
    </div>
</div>   
@endsection