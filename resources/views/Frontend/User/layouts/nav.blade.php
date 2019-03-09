<nav class="navbar">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">訂單管理</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">通訊錄</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('password.request') }}">重設密碼</a>
        </li>
        @auth   
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endauth
    </ul>
</nav>