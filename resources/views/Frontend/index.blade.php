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
 
  <div class="container" id="index-about">
    <h2 class="area_head title_type01">ABOUT</h2>
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
    <h2 class="area_head title_type01">NEWS</h2>
    <div class="row news-des">
            <ul id="news_topics">			
                 <li>
                    <time>2018年08月01日</time>
                    <br class="break">
                    <span class="news_text"><a href="http://asahipan.co.jp/2018/08/01/8%e6%9c%8824%e6%97%a5%e3%80%8c%e5%a0%ba%e3%82%b5%e3%83%b3%e3%82%bb%e3%83%83%e3%83%88%e3%82%ac%e3%83%bc%e3%83%87%e3%83%b3%e3%80%8d%e3%81%ab%e5%87%ba%e5%ba%97%e3%81%84%e3%81%9f%e3%81%97%e3%81%be/">8月24日「堺サンセットガーデン」に出店いたします。</a></span>
                </li>
                <li>
                    <time>2018年08月01日</time>	
                    <br class="break">
                    <span class="news_text"><a href="http://asahipan.co.jp/2018/08/01/8%e6%9c%8824%e6%97%a5%ef%bd%9e26%e6%97%a5%e3%80%8c%e3%81%be%e3%81%90%e3%82%8d%e3%83%91%e3%83%bc%e3%82%af%e3%80%8d%e3%81%ab%e5%87%ba%e5%ba%97%e3%81%84%e3%81%9f%e3%81%97%e3%81%be%e3%81%99/">8月24日～26日「まぐろパーク」に出店いたします。</a></span>
                </li>
                <li>
                    <time>2018年07月20日</time>
                    <br class="break">
                    <span class="news_text"><a href="http://asahipan.co.jp/2018/07/20/%e5%a0%ba%e3%81%a1%e3%82%93%e9%9b%bb%e3%83%91%e3%83%b3%e3%81%ae%e3%83%a4%e3%83%9e%e3%83%88%e4%be%bf%e3%81%ab%e3%82%88%e3%82%8b%e3%81%8a%e5%b1%8a%e3%81%91%e3%82%92%e4%b8%80%e6%99%82%e5%81%9c%e6%ad%a2/">堺ちん電パンのヤマト便によるお届けを一時停止いたします。</a></span>
                </li>
                <li>
                    <time>2018年06月04日</time>
                    <br class="break">
                    <span class="news_text"><a href="http://asahipan.co.jp/2018/06/04/%e3%80%8c%e7%ac%ac20%e5%9b%9e%e3%80%80%e8%b7%af%e9%9d%a2%e9%9b%bb%e8%bb%8a%e3%81%be%e3%81%a4%e3%82%8a%e3%80%8d%e3%81%ab%e5%87%ba%e5%ba%97%e3%81%84%e3%81%9f%e3%81%97%e3%81%be%e3%81%99/">「第20回　路面電車まつり」に出店いたします。</a></span>
                </li>
                <li>
                    <time>2018年05月31日</time>
                    <br class="break">
                    <span class="news_text"><a href="http://asahipan.co.jp/2018/05/31/%e3%80%8c%e5%a0%ba%e3%81%a1%e3%82%93%e9%9b%bb%e3%83%91%e3%83%b3%e3%80%8d%e7%89%b9%e8%a8%ad%e3%82%b5%e3%82%a4%e3%83%88%e3%82%92%e3%83%aa%e3%83%aa%e3%83%bc%e3%82%b9%e8%87%b4%e3%81%97%e3%81%be%e3%81%97/">「堺ちん電パン」特設サイトをリリース致しました。</a></span>
                </li>
           </ul>
    </div>
  </div>
@endsection
    
