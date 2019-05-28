<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-light fixed-top " id="site-nav">


    
    <button class="navbar-toggler x collapsed" id="toggle-button" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="close" aria-label="Toggle navigation">
      
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
        {{-- <span class="navbar-toggler-text  font-weight-bold">MENU</span>   --}}
      
    </button>

    <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none mx-auto" href="{{route('home')}}">HSUN COFFEE</a>
    <a class="cart-toggler-link  d-lg-none" href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i></a>
    @guest
      <a class="login-toggler-link d-lg-none"  href="{{route('login')}}"><i class="fas fa-user"></i></a>
    @endguest
    @auth
      <a class="dropdown-toggle d-lg-none" href="#" id="user-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right d-lg-none" aria-labelledby="navbarDropdownMenuLink">
        <a class="user dropdown-item"  href="#" ><i class="fas fa-user"></i>  
          {{  Auth::user()->name_last  }}{{  Auth::user()->name_first  }} 
        </a>
        <a class="order-management dropdown-item"  href="#" >
          <i class="fas fa-shopping-bag"></i> 訂單管理 
        </a>
        <a class="address-book dropdown-item"  href="#" >
          <i class="fas fa-address-book"></i> 通訊錄 
        </a>
        <a class="order-management dropdown-item"  href="#" >
          <i class="fas fa-key"></i> 重設密碼 
        </a>
        <a class="logout dropdown-item" href="{{ route('logout') }}" 
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i>登出
        </a>
      </div>
    @endauth
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="nav navbar-nav mr-auto vertical flex-column" id="mainNav">
        <li class="nav-item d-none d-lg-block" id="site-logo" >
            <a class="nav-link logo" href="{{route('home')}}"><img class="rounded logo-img" src="{{asset('img/icon/home_icon.png')}}"></a>
        </li>
        <li class="nav-item nav-hover">
          <a class="nav-link text-uppercase font-weight-bold" id="about-text" href="{{route('about')}}"><img src="{{asset('img/icon/about_icon.png')}}"><span class="align-middle"> 關於我們</span></a>
        </li>
        <li class="nav-item nav-hover">
          <a class="nav-link text-uppercase font-weight-bold" id="news-text" href="{{route('news')}}"><img src="{{asset('img/icon/news_icon.png')}}"><span class="align-middle"> 最新消息</span></a>
        </li>
        <li class="nav-item nav-hover">
          <a class="nav-link text-uppercase font-weight-bold" id="products-text" href="{{route('products')}}"><img src="{{asset('img/icon/products_icon.png')}}"><span class="align-middle"> 商品介紹</span></a>
        </li>
        <li class="nav-item nav-hover">
          <a class="nav-link text-uppercase font-weight-bold" id="shop-text" href="{{route('shop')}}"><img src="{{asset('img/icon/shop_icon.png')}}"><span class="align-middle"> 店鋪消息</span></a>
        </li>
        <li class="nav-item nav-hover">
          <a class="nav-link text-uppercase font-weight-bold" id="cart-text" href="{{route('cart')}}"><img src="{{asset('img/icon/cart_icon.png')}}"><span class="align-middle"> 購物車</span></a>
        </li>
      </ul>
    </div>
    <div class="d-none d-lg-block" id="nav-info">
      <div class="cart">
        <a class="cart-link" href="{{route('cart')}}">
          <div class="in-cart">             
            <span class="cart-num"><i class="fas fa-shopping-cart"></i><strong>{{Session::has('cart') ? Session::get('cart')->totalQty : '0'}}</strong>項</span>
            <span class="cart-price"><strong>{{Session::has('cart') ? Session::get('cart')->totalPrice : '0'}}</strong>元</span>
          </div>
        </a>
      </div>
      <div class="memberships">
        @guest                
          <a class="login" href="{{ route('login') }}"><i class="fas fa-user"></i>會員登入</a>
          <a class="registr" href="{{ route('register') }}"><i class="fas fa-pen-fancy"></i>會員註冊</a>
        @endguest
        @auth   
          <div class="dropdown"  >    
            <a class="user-menu dropdown-toggle"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i>{{  Auth::user()->name_last  }}{{  Auth::user()->name_first  }} 
            </a>
            
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              @if (Auth::user()->type =='1')
                <a class="order-management dropdown-item"  href="{{route('dashboard')}}" >
                  <i class="fas fa-tachometer-alt"></i> 後台系統 
                </a>    
              @else
                <a class="order-management dropdown-item"  href="#" >
                  <i class="fas fa-shopping-bag"></i> 訂單管理 
                </a>
                <a class="address-book dropdown-item"  href="#" >
                  <i class="fas fa-address-book"></i> 通訊錄 
                </a>
                <a class="order-management dropdown-item"  href="#" >
                  <i class="fas fa-key"></i> 重設密碼 
                </a> 
              @endif

            </div>
          </div>
          <a class="logout" href="{{ route('logout') }}" 
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>登出
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        @endauth
      </div>
    </div>

  
</nav>

