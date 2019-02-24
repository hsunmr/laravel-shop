@extends('frontend.layouts.master') 
@section('title','NEWS')
@section('content')
<div class="container" id="news_detail_content">
    <div class="news_detail_des">
        <time>2019.01.29</time>
        <h3 class="post_title">OPEN</h2>
        <div class="row" id="post_img">
            <div class="col">
                <img class="d-block w-100" src="../img/about.jpg">
            </div>
        </div>
        <div class="row" id="post_text">
            <div class="col">
                <p>
                    We want to be your coffee shop. A place that brings a smile to your face with just one cup of roasted goodness.<br>
                    What drives us is bringing joy to each and every person who walks through our doors.<br>
                    In the hope that your happiness touches others throughout the rest of your day.<br>
                    Like a chain reaction, building a better community and a better world.
                </p>
            </div>
        </div>
    </div>
    <a href="{{route('news')}}"><span>回到NEWS</span></a>
</div>


@endsection