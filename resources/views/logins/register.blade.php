<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <div class="container"><br>
        <div class="col-md-6 col-md-offset-3">
            <h3 class="text-center">FORM REGISTRASI PENGGUNA</h3>
            <hr>
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <form action="/register/actionregister" method="post">

            @csrf
                <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Nama Pemilik UTTP</label>
                    <input type="text" name="namapemilikuttp" class="form-control" placeholder="Nama Pemilik UTTP" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-home"></i> Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-phone"></i> No. Telp.</label>
                    <input type="text" name= "notelp" class="form-control" placeholder="No. Telp." required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-address-book"></i> Kelurahan</label>
                    <input type="text" name="kelurahan" class="form-control" placeholder="Kelurahan" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-address-book"></i> Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-address-book"></i> Role</label>
                    <input type="text" name="role" class="form-control" value="Guest" readonly>
                </div>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Registrasi</button>
                <hr>
                <p class="text-center">Sudah punya akun silahkan <a href="home">Login Disini!</a></p>
            </form>
        </div>
    </div>
</body>
</html>