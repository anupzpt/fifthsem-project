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

                <form class="rounded bg-white shadow p-5" action="{{route('resetPassword')}}" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="hidden" name="id" value="{{$user[0]['id']}}">
                        <input type="password" name="password" placeholder="Password">
                        <br><br>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary submit_btn w-100 my-4" value="Reset Password">Reset</button>
                    
                </form>
            </div>
        </div>
    </section>
</body>

</html>
