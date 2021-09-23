<html>

<head>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<!--Fontawesome CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<!--Extra link-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style type="text/css">

html,body{
background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
    /* font-family: 'Numans', sans-serif; */
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
    /* font-family: 'Numans', sans-serif; */
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd; 
     top: 55%;
    left: 0; 
    z-index: 1; 
    /* font-family: 'Numans', sans-serif; */
}

</style>

</head>

<body>
   
    <div class="container my-5">

        <div>
        <article class="card-body mx-auto" style="max-width: 400px;">

      <!-- Validation Errors -->
      {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

            <h4 class="text-light mt-3 text-center">Create Account</h4>

            <form method="POST" action="{{ route('register') }}">
            @csrf

            @if($errors->any())
			  <div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				@foreach ($errors->all() as $error)
				<strong>{{$error}}</strong><br>
				@endforeach
			</div>
			@endif

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                 </div>
   
                <x-input id="name" class="form-control" placeholder="Full Name" type="text" name="name" :value="old('name')" required autofocus />
            </div> 
            
            <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                 </div>

                <x-input id="email" class="form-control" placeholder="Email address" type="email" name="email" :value="old('email')" required />
            </div>     
   
            <!-- Create password -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>

                <x-input id="password" class="form-control"
                type="password"
                name="password" placeholder="Create password"
                required autocomplete="new-password" />
            </div> 
            
            
            <!-- Confirm Password -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>

                <x-input id="password_confirmation" class="form-control"
                                  type="password" placeholder="Confirm password"
                                  name="password_confirmation" required />
            </div> 
            
            
            <!-- Submit -->                                      
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
            </div> <!-- form-group// -->      
            <p class="text-light text-center">Have an account? <a href="{{ route('login') }}" class="text-warning">Log In</a> </p>                                                                 
        </form>
        </article>
        </div> <!-- card.// -->
        
        </div> 
        <!--container end.//-->
        

</body>

</html>




