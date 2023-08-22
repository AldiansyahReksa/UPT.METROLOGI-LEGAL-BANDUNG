<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animated Background Login Screen</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <div id="login-box">
        <div class="logo">
            <img src="http://placehold.it/100x100?text=DD" class="img img-responsive img-circle center-block"/>
            <h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
        </div>

        <div class="controls">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="text" name="email" placeholder="Email" class="form-control" />
                <input type="password" name="password" placeholder="Password" class="form-control" />
                <button type="submit" class="btn btn-default btn-block btn-custom" id="login-button">Login</button>
                <!-- <button type="button" class="btn btn-default btn-block btn-custom" id="register-button">Register</button> -->
                <p class="text-center">Belum punya akun? <a href="/register">Registrasi</a> sekarang!</p>
            </form>
        </div>
    </div>
</div>
<div id="particles-js"></div>
<script src='https://code.jquery.com/jquery-1.11.1.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
