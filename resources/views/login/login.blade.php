@extends('layouts.nav2')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('login')}}/css/Login.css">
    <link rel="stylesheet" href="{{url('login')}}/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{url('login')}}/fontawesome-free-6.0.0-web/fontawesome-free-6.0.0-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
    <title>Log in</title>
</head>
<body>
    <div class="Log-in">
        <form action="{{route('user.login')}}" method="post">
            @csrf
            <section class="copy">
                <h2>LOG IN NOW</h2>
                <div class="signup-container">
                    <p>Don't have an account yet? <a href="sign-up">
                    Sign up</a></p>
                </div> 
            </section>
            <div class="input-container username">
                <label for="username">UserName</label>
                <input id="username" name="username" type="username" >
            </div>
            <div class="input-container password">
                <label for="password">Password</label>
                <input id="password" name="password"  type="password" placeholder="Must be at least 6 characters" >
            </div>
            @if(session('failed'))
                <p class="noti">Invalid username or password</p>
            @endif
            <div class="input-container cta">
                <label class="checkbox-container">
                    <input type="checkbox">
                    <span class="checkmark"></span> 
                    Remember me
                    <a href="#" class="forgetpass">Forgot Password?</a>
                </label>
            </div>
            <button class="login-btn" type= "submit">Log in</button>
            <section class=" copy legal"> 
                <p><span class="small">By continuing, you agree to accept our <br><a href="#">Privacy Policy</a> &amp; <a href="#">Terms of Service</a>.</span></p>
            </section>
        </form>
    </div>
</body>

</html>
@stop()