@extends('frontend.layouts.master') 
@section('title','ABOUT')
@section('content')
<div class="container" id="about_page_content">
    <div class="about_page_des">
        <h2 class="page_title">ABOUT</h2>
        <div class="row about_page_img">
            <div class="col">
                <img class="d-block w-100" src="../img/index/about_img.jpg">
            </div>
        </div>
        <div class="row about_page_word">
            <div class="col">
                <p>
                    私たちが目指すのは、<br>
                    たった一杯で幸せになるコーヒー屋。<br>
                    まずは目の前の人を笑顔にすること、<br>
                    そのための努力は、惜しみません。<br>
                    一つの笑顔が連鎖していくように、<br>
                    世界がワクワクで溢れるまで。
                </p>
                <p>
                    We want to be your coffee shop. A place that brings a smile to your face with just one cup of roasted goodness.<br>
                    What drives us is bringing joy to each and every person who walks through our doors.<br>
                    In the hope that your happiness touches others throughout the rest of your day.<br>
                    Like a chain reaction, building a better community and a better world.
                </p>
            </div>
        </div>
    </div>

<div class="container" id="about_page_history">
    <h2 class="page_title">History</h2>
    <div class="row about_history_des">
        <ul>			
            <li>
                <time>2019年2月5日</time>
                <br class="break">
                <span class="history_text">OPEN</a></span>
            </li>
            <li>
                <time>2019年2月5日</time>
                <br class="break">
                <span class="history_text">OPEN</a></span>
            </li>
        </ul>
    </div>
</div>
</div>   
@endsection