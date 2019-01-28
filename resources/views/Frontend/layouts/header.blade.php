<header  id="header"> 

   
    @include('frontend.layouts.navbar')
   
     @if(isset($wrapper))      
      {{-- header bg carousel --}}
      <div class="carousel-fade carousel slide " data-ride="carousel">
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
     
    @endif 

    <div class="container-fluid" id="header-info">123</div>

</header>



