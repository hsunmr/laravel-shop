@extends('frontend.layouts.master') 
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
 
  <div class="container" id="index-about">
    <h2 class="head_title">ABOUT</h2>
        <div class="row about-des">
          <div class="col-lg-6 ">
            <div id="about-img">
                <img class="d-block w-100"src="../img/index/about_img.jpg">
            </div>
          </div>
          <div class="col-lg-6">
            <div id="about-word">
                <p class="about_des_txt -ja">
                    私たちが目指すのは、<br>
                    たった一杯で幸せになるコーヒー屋。<br>
                    まずは目の前の人を笑顔にすること、<br>
                    そのための努力は、惜しみません。<br>
                    一つの笑顔が連鎖していくように、<br>
                    世界がワクワクで溢れるまで。
                </p>
                <p class="about_des_txt -en">
                    We want to be your coffee shop. A place that brings a smile to your face with just one cup of roasted goodness.<br>
                    What drives us is bringing joy to each and every person who walks through our doors.<br>
                    In the hope that your happiness touches others throughout the rest of your day.<br>
                    Like a chain reaction, building a better community and a better world.
                </p>
            </div>
          </div>
        </div>
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
        <p><a href="#">more</a></p>
    </div>
  </div>
@endsection
    
