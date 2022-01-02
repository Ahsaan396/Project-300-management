<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
	<nav class="navbar navbar-expand-lg navbar-warning bg-warning">
		<div class="container-fluid">
		  <a class="navbar-brand text-dark" href="#">Project 400 Management System</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
			<ul class="navbar-nav mb-2 mb-lg-0">
			<li class="nav-item">
			<a class="nav-link active text-dark" aria-current="page" href="{{route('result')}}">Result</a>
			</li>
           
			@if(Auth::check())
      <li class="nav-item active">
				<a class="nav-link text-dark" href="{{route('dashboard')}}">Admin Panel</a>
			</li>
			<li class="nav-item active">
			  <div>
          <form action="{{route('logout')}}" method="POST" id="logout-form">
                @csrf 
                <a href="{{route('logout')}}"
                class="nav-link text-dark">Logout</a>
           </form>
          </div>
			</li>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

			@endif
	
		    </ul>
	
		  </div>
		</div>
	    </nav>


        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 pics " src="{{asset('frontend/pic1.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 pics" src="{{asset('frontend/pic2.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 pics" src="{{asset('frontend/pic3.jpg')}}" alt="Third slide">
    <title>Project 400 management system</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-warning bg-warning">
      <div class="container-fluid">
        <a class="navbar-brand text-dark" href="#">Project 400 Management System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link active text-dark" aria-current="page" href="{{route('result')}}">Status</a>
        </li>
             
        @if(Auth::check())
        <li class="nav-item active">
          <a class="nav-link text-dark" href="{{route('dashboard')}}">Admin Panel</a>
        </li>
        <li class="nav-item active">
          <div>
            <form action="{{route('logout')}}" method="POST" id="logout-form">
                  @csrf 
                  <a href="{{route('logout')}}"
                  class="nav-link text-dark">Logout</a>
             </form>
            </div>
        </li>
  
        @else
        <li class="nav-item active">
          <a class="nav-link text-dark" href="{{route('login')}}">Login</a>
        </li>
  
        @endif
    
          </ul>
    
        </div>
      </div>
        </nav>
  
  
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{asset('frontend/pic1.jpg')}}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('frontend/pic2.jpg')}}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="..." alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container">
  <br>
  <h1>Welcome to Metropolitan University Project 400 Management System</h1>
  <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. At natus voluptates ad aspernatur id dolorem maiores quas vero illum. Tempora facere quidem suscipit modi provident soluta saepe necessitatibus, assumenda repellendus nesciunt nemo eligendi facilis, nisi dignissimos quibusdam voluptatum voluptas doloremque obcaecati, amet harum. Sit, nulla laudantium? Illo aperiam reprehenderit earum.
    <h1>About Us</h1>
    <br>
    <div class="row">
      <div class="col-md-6">
          <div class="card" style="width: 18rem; height:22rem">
      <img class="card-img-top" src="{{asset('frontend/pic4.jpg')}}" alt="Card image cap">
      <div class="card-body">
        <h4>Ahsanul Hakim</h4>
        <h6>Metropolitan University</h6>
        <h6>B.Sc in Computer Science and Engineering</h6>
      </div>
    </div>
      </div>
      <div class="col-md-6">
        <div class="card" style="width: 18rem;height:22rem">
  <img class="card-img-top" src="{{asset('frontend/pic5.jpeg')}}" alt="Card image cap">
  <div class="card-body">
    <h4>Ahsanul Hakim</h4>
    <h6>Metropolitan University</h6>
    <h6>B.Sc in Computer Science and Engineering</h6>
  </div>
      </div>
    </div>
  
    
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
