<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>
<body>
    <div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
        <h3>Sign in here</h3>
        <form action="{{ route('process_login') }}" method="post">
            @csrf
            <div class="inputBox">
                <input id="uname" type="text" name="email" placeholder="Username">
                <input id="pass" type="password" name="password" placeholder="Password"> 
            </div> 
            <input type="submit" name="" value="Login">
        </form> 
        <a href="#">Forget Password<br> </a>
        <div class="text-center">
            <p style="color: #59238F;">Sign-Up</p>
        </div>
    </div>
</body>
</html>
