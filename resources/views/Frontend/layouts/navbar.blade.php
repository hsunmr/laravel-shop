<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-light fixed-top " id="site-nav">
  <div class="container-fluid" id="navbar-container">

    
    <button class="navbar-toggler x collapsed" id="toggle-button" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="close" aria-label="Toggle navigation">
      
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
        {{-- <span class="navbar-toggler-text  font-weight-bold">MENU</span>   --}}
      
    </button>

    <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none mx-auto" href="{{route('home')}}">HSUN COFFEE</a>
    <a class="cart-toggler-link  d-lg-none" href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i></a>
    <a class="login-toggler-link d-lg-none"  href="#"><i class="fas fa-user"></i></a>
    
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="nav navbar-nav mr-auto vertical flex-column" id="mainNav">
        <li class="nav-item d-none d-lg-block" id="site-logo" >
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
    </div>
    <div class="d-none d-lg-block" id="nav-info">
      <div class="cart">
        <a class="cart-link" href="{{route('cart')}}">
          <div class="in-cart">             
            <span class="cart-num"><i class="fas fa-shopping-cart"></i><strong>0</strong>項</span>
            <span class="cart-price"><strong>0</strong>元</span>
          </div>
        </a>
      </div>
      <div class="memberships">
        <a class="login" href="#"><i class="fas fa-user"></i>會員登入</a>
        <a class="regist" href="#"><i class="fas fa-pen-fancy"></i>會員註冊</a>
      </div>
    </div>
  </div>
  
</nav>

