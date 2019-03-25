<div id="sidebar" >
    
    <ul class="navbar-nav accordion" id="sidebar-content">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand" href="{{route('dashboard')}}">
            <i class="fas fa-chess-bishop fa-lg"></i><span class="sidebar-brand-text"> HSUN 後台</span>
        </a>
    
        <!-- Divider -->
        <hr>
    
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
          
        <!-- Divider -->
        <hr>
          
        <!-- Heading -->
        <div class="sidebar-heading">
            頁面管理
        </div>
    
        <!-- Nav Item  -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapse-home" aria-expanded="false" href="#" >
                <i class="fas fa-home fa-fw" aria-hidden="true"></i>
                <span>首頁</span>
            </a>
            <div class="collapse bg-white rounded collapse-box" id="collapse-home" data-parent="#sidebar-content">
                <a class="collapse-item" href="{{route('backend.home.carousel.index')}}">輪播圖</a>
                <a class="collapse-item" href="{{route('backend.home.aboutdiv.index')}}">關於區塊</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapse-about" aria-expanded="false" href="#" >
                <i class="fas fa-info-circle fa-fw" aria-hidden="true"></i>
                <span>關於我們</span>
            </a>
            <div class="collapse bg-white rounded collapse-box" id="collapse-about" data-parent="#sidebar-content">
                <a class="collapse-item" href="{{route('backend.about.introdiv.index')}}">介紹區塊</a>
                <a class="collapse-item" href="{{route('backend.about.historydiv.index')}}">沿革區塊</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapse-news" aria-expanded="false" href="#" >
                <i class="far fa-newspaper fa-fw" aria-hidden="true"></i>
                <span>最新消息</span>
            </a>
            <div class="collapse bg-white rounded collapse-box" id="collapse-news" data-parent="#sidebar-content">
                <a class="collapse-item" href="#">新聞區塊</a>
                <a class="collapse-item" href="#">新聞內文</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapse-product" aria-expanded="false" href="#" >
                <i class="fas fa-coffee fa-fw" aria-hidden="true"></i>
                <span>商品介紹</span>
            </a>
            <div class="collapse bg-white rounded collapse-box" id="collapse-product" data-parent="#sidebar-content">
                <a class="collapse-item" href="#">商品</a>
                <a class="collapse-item" href="#">菜單</a>
            </div>
        </li>        

        <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fas fa-shopping-bag fa-fw" aria-hidden="true"></i>
            <span>店鋪消息</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapse-share" aria-expanded="false" href="#" >
                <i class="fas fa-bullhorn fa-fw" aria-hidden="true"></i>
                <span>共用內容</span>
            </a>
            <div class="collapse bg-white rounded collapse-box" id="collapse-share" data-parent="#sidebar-content">
                <a class="collapse-item" href="{{route('backend.share.shopinfo.index')}}">商品資訊</a>
                <a class="collapse-item" href="{{route('backend.share.footer.index')}}">FOOTER</a>
            </div>
        </li>
          
        <!-- Divider -->
        <hr>
          
        <!-- Heading -->
        <div class="sidebar-heading">
            使用者管理
        </div>
          
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fas fa-file-invoice-dollar fa-fw" aria-hidden="true"></i>
            <span>訂單資訊</span>
            </a>
        </li>
    
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
            <i class="fas fa-users-cog fa-fw" aria-hidden="true"></i>
            <span>使用者資料</span></a>
        </li>
    
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table fa-fw" aria-hidden="true"></i>
            <span>Tables</span></a>
        </li>
    
        <!-- Divider -->
        <hr>
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    
    </ul>
</div>
