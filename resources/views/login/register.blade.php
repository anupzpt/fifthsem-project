<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<title>Register</title>
<link rel="stylesheet" href="loginpanel/css/style.css">
</head>

<body>
    <section class="wrapper">
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <div class="logo">
                    <img src="loginpanel/images/logo-black.png" class="img-fluid" alt="logo">
                </div>
                <form class="rounded bg-white shadow p-5">
                    <p class="text-dark fw-bolder fs-4 mb-2">Create an Account</p>
                    <div class="fw-normal text-muted mb-2">
                        Already have an account ? <a href="{{url('/login')}}" class="text-primary fw-bold text-decoration-none">Login Here</a>
                    </div>
                    <div class="text-center text-muted text-uppercase mb-3">or</div>

                    <a hfer="#" class="btn btn-light login_with w-100 mb-4">
                        <img src="loginpanel/images/google-icon.svg" class="img-fluid me-3">Sing in with Google</a>
                    </a>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="First Name">
                        <label for="floatingInput">First Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Last Name">
                        <label for="floatingInput">Last Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    
                    <span class="password-info mt-2">
                        Use at least 8 characters with a mix of letters, numbers & symbols.
                    </span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Confirm Password</label>
                    </div>

                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label ms-2" for="gridCheck">
                            I Agree <a href="#">Terms and conditions</a>.
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary submit_btn w-100 my-4">Continue</button>
                    <!-- <div class="text-center text-muted text-uppercase mb-3">or</div>
                    <a hfer="#" class="btn btn-light login_with w-100 mb-3">
                        <img src="loginpanel/images/google-icon.svg" class="img-fluid me-3">Continue with Google</a>
                    </a>
                    <a hfer="#" class="btn btn-light login_with w-100 mb-3">
                        <img src="loginpanel/images/facebook-icon.svg" class="img-fluid me-3">Continue with Facebook</a>
                    </a>
                    <a hfer="#" class="btn btn-light login_with w-100 mb-3">
                        <img src="loginpanel/images/linkedin-icon.svg" class="img-fluid me-3">Continue with Linkedin</a>
                    </a> -->
                </form>
            </div>
        </div>
    </section>
</body>

</html>