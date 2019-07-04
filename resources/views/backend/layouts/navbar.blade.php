<nav class="navbar navbar-expand navbar-light bg-white shadow">
    
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <!-- Nav Item - User Information -->
      @guest                
        <a class="login" href="{{ route('login') }}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>會員登入</a>
      @endguest
      @auth  

      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="">{{  Auth::user()->nickname }} </span>
          <i class="fas fa-user-astronaut fa-2x"></i>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{route('home')}}">
            <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
            Home
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('admin.logout') }}" 
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </li>
      @endauth  
    </ul>

  </nav>