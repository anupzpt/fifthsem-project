<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<title>Forget password</title>
<link rel="stylesheet" href="loginpanel/css/style.css">
</head>

<body>
    <section class="wrapper">
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <div class="logo">
                    <img src="loginpanel/images/logo-black.png" class="img-fluid" alt="logo">
                </div>

                <form class="rounded bg-white shadow p-5" action="{{route('forgetPassword')}}" method="post">
                    @csrf
                    <p class="text-dark fw-bolder fs-4 mb-2">Welcome to Artihc! Please login</p>
                    @if(Session::has('error'))
                    <p class="text-danger">{{Session::get('error')}}</p>
                    @endif

                    @if(Session::has('success'))
                    <p class="text-danger">{{Session::get('success')}}</p>
                    @endif
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error ('email') is-invalid @enderror" id="floatingInput" name="email" placeholder="name@example.com">
                        <span style="color :red;">@error('email') {{$message}} @enderror</span>
                        <label for="floatingInput">Email address</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary submit_btn w-100 my-4" value="Forget Password">Continue</button>
                    
                </form>
            </div>
        </div>
    </section>
</body>

</html>
