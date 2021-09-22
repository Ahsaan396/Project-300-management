<html>

<head>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<style type="text/css">

.divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}

</style>

</head>

<body>
   
    <div class="container my-5">

        <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <h4 class="card-title mt-3 text-center">Create Account</h4>

            <form method="POST" action="{{ route('register') }}">
            @csrf

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
   
            <!-- form-group end.// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>

                <x-input id="password" class="form-control"
                type="password"
                name="password" placeholder="Create password"
                required autocomplete="new-password" />
            </div> 
            
            
            <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>

                <x-input id="password_confirmation" class="form-control"
                                  type="password" placeholder="Confirm password"
                                  name="password_confirmation" required />
            </div> 
            
            
            <!-- form-group// -->                                      
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
            </div> <!-- form-group// -->      
            <p class="text-center">Have an account? <a href="{{ route('login') }}">Log In</a> </p>                                                                 
        </form>
        </article>
        </div> <!-- card.// -->
        
        </div> 
        <!--container end.//-->
        

</body>

</html>




