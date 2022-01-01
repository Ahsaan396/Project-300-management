  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{asset('frontend/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div> --}}
  
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
        </li>    
      </ul>
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class = "nav-item">
          <a class="nav-link text-dark" href="{{route('home')}}">Home</a>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item ">
          <div>
                    <form action="{{route('logout')}}" method="POST" id="logout-form">
                          @csrf 
                          <a href="{{route('logout')}}"
                          class="nav-link text-dark">Logout</a>
                     </form>
          </div>
        </li>
  
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
  
        {{-- <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li> --}}
  
      </ul>
    </nav>
      <!-- /.navbar -->