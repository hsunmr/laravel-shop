<!-- Navigation -->

<nav class="navbar navbar-expand-md navbar-light fixed-top " id="site-nav">
  <div class="container-fluid" id="navbar-container">

    
    <button class="navbar-toggler x collapsed" id="toggle-button" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="close" aria-label="Toggle navigation">
      
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
        {{-- <span class="navbar-toggler-text  font-weight-bold">MENU</span>   --}}
      
    </button>
    <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-md-none mx-auto" href="{{route('home')}}"><img class="rounded toggle-logo-img" src="img/icon/home_icon.png"></a>
 
    <div class="collapse navbar-collapse" id="navbarResponsive">
  
      <ul class="nav navbar-nav mr-auto vertical flex-column" id="mainNav">
        <li class="nav-item d-none d-lg-block d-md-block" id="site-logo" >
            <a class="nav-link logo" href="{{route('home')}}"><img class="rounded logo-img" src="img/icon/home_icon.png"></a>
        </li>
        <li class="nav-item nav-hover">
          <a class="nav-link text-uppercase font-weight-bold" id="about-text" href="{{route('about')}}"><img src="img/icon/about_icon.png"><span class="align-middle"> 關於我們</span></a>
        </li>
        <li class="nav-item nav-hover">
          <a class="nav-link text-uppercase font-weight-bold" id="news-text" href="{{route('news')}}"><img src="img/icon/news_icon.png"><span class="align-middle"> 最新消息</span></a>
        </li>
        <li class="nav-item nav-hover">
          <a class="nav-link text-uppercase font-weight-bold" id="products-text" href="{{route('products')}}"><img src="img/icon/products_icon.png"><span class="align-middle"> 商品介紹</span></a>
        </li>
        <li class="nav-item nav-hover">
          <a class="nav-link text-uppercase font-weight-bold" id="shop-text" href="{{route('shop')}}"><img src="img/icon/shop_icon.png"><span class="align-middle"> 店鋪消息</span></a>
        </li>
        <li class="nav-item nav-hover">
          <a class="nav-link text-uppercase font-weight-bold" id="cart-text" href="{{route('cart')}}"><img src="img/icon/cart_icon.png"><span class="align-middle"> 購物車</span></a>
        </li>

     
      </ul>
      <ul class="nav navbar-nav d-none d-md-block vertical" id="nav-intro" >
        <li class="nav-item">
            <a class="nav-link"  href="#"><img src="img/icon/fb_icon.png"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="#"><img src="img/icon/ig_icon.png"></a>
            
        </li>
         
      </ul>  
   
    </div>
  </div>
</nav>