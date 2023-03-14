<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<title>Login</title>
<link rel="stylesheet" href="loginpanel/css/style.css">
</head>

<body>
    <section class="wrapper">
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <div class="logo">
                    <img src="loginpanel/images/logo-black.png" class="img-fluid" alt="logo">
                </div>

                <form class="rounded bg-white shadow p-5" action="{{route('login')}}" method="post">
                    @csrf
                    <p class="text-dark fw-bolder fs-4 mb-2">Welcome to Artihc! Please login</p>
                    <div class="fw-normal text-muted mb-4">
                        New Here? <a href="{{route('register1')}}" class="text-primary fw-bold text-decoration-none">Create an Account</a>
                    </div>
                    @if(Session::has('error'))
                    <p class="text-danger">{{Session::get('error')}}</p>
                    @endif
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error ('email') is-invalid @enderror" id="floatingInput" name="email" placeholder="name@example.com">
                        <span style="color :red;">@error('email') {{$message}} @enderror</span>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error ('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password">
                        <span style="color :red;">@error('password') {{$message}} @enderror</span>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="mt-2  text-end">
                        <a href="/forget-password" class="text-primary fw-bold text-decoration-none">Forget Password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary submit_btn w-100 my-4">Continue</button>
                    <div class="text-center text-muted text-uppercase mb-3">or</div>
                    <a href="{{route('googleLogin')}}" class="btn btn-light login_with w-100 mb-3">
                        <img src="loginpanel/images/google-icon.svg" class="img-fluid me-3">Continue with Google</a>
                    </a>
                    <a href="#" class="btn btn-light login_with w-100 mb-3">
                        <img src="loginpanel/images/facebook-icon.svg" class="img-fluid me-3">Continue with Facebook</a>
                    </a>
                    <a href="{{route('home.index')}}" class="btn btn-primary login_with w-100 mb-3">Back to Home Page</a>
                    </a>
                    <!-- <a hfer="#" class="btn btn-light login_with w-100 mb-3">
                        <img src="loginpanel/images/linkedin-icon.svg" class="img-fluid me-3">Continue with Linkedin</a>
                    </a> -->
                </form>
            </div>
        </div>
    </section>
</body>

</html>
