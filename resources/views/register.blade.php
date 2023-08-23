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
            <h3 class="text-center">FORM REGISTRASI PEGAWAI</h3>
            <hr>
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <form action="{{route('actionregister')}}" method="post">
            @csrf
                <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Nama </label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-book"></i> NIP </label>
                    <input type="text" name="nip" class="form-control" placeholder="NIP" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-phone"></i> No. Telp.</label>
                    <input type="text" name= "notelp" class="form-control" placeholder="No. Telp." required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-address-book"></i> Role</label>
                    <select name="role" class="form-control">
                    <option value="Admin">Admin</option>
                    <option value="Pegawai">Pegawai</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Registrasi</button>
                <hr>
                <p class="text-center">Sudah punya akun? silahkan <a href="home">Login Disini!</a></p>
            </form>
        </div>
    </div>
</body>
</html>