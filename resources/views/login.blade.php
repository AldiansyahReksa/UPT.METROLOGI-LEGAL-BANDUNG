<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UPT Metrologi Legal - Dinas Perdagangan dan Perindustrian Kota bandung</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    

</head>
<body>
    <div class="container"><br>
    <div >
            <img src="{{ asset('images/jojo.png') }}" alt="Transparent Image" class="centered-image">
        </div>
    <div class="vertical-center">
        <div class="col-md-4 col-md-offset-4">
            <h2 class="text-center"><b>SELAMAT DATANG!</b><br> di UPT Metrologi Legal</h3>
            <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('actionlogin') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control transparent-input" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control transparent-input" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                <hr>
                <p class="text-center">Belum punya akun? <a href="register">Registrasi</a> sekarang!</p>
            </form>
        </div>
        </div>
    </div>
</body>
</html>