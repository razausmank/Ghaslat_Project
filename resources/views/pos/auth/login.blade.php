{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Ghaslat</title>

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="{{ asset('pos/css/styles.css') }}">


</head>

<body>
    <section>
        <div class="ghaslat-logo">
            <img src="images/Ghaslat - Copy.png" alt="">
        </div>
        <div class="form-div">
            <form class="form" id="kt_login_signin_form" method="POST" action="{{ route('pos.login') }}">
                <input type="email" placeholder="Email" name="username"><br>
                <input type="password" placeholder="Password" name="password"><br>
                <button class="btn btn-outline-success btn-lg sign-in-btn">Sign in</button>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html> --}}
@if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif
<x-jet-validation-errors />
<form class="form" id="kt_login_signin_form" method="POST" action="{{ route('pos.login') }}">
    @csrf
    <div class="form-group">
        <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text"
            placeholder="Email" name="username" autocomplete="off" />
    </div>
    <div class="form-group">
        <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password"
            placeholder="Password" name="password" />
    </div>
    <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
        <label class="checkbox checkbox-outline checkbox-white text-white m-0">
            <input type="checkbox" name="remember" />Remember me
            <span></span></label>
        <a href="javascript:;" id="kt_login_forgot" class="text-white font-weight-bold">Forget Password ?</a>
    </div>
    <div class="form-group text-center mt-10">
        <button id="kt_login_signin_submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">Sign In</button>
    </div>
</form>
