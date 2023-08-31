<!DOCTYPE html>
<html>
<head>
<title>WELCOME UPT. METROLOGI LEGAL</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="myPage">

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme-d2 w3-left-align"> <!-- Change to w3-right-align -->
    <a href="#" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
    <a href="#fitur" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Fitur</a>
    <a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white fa fa-user"> {{Auth::user()->email}}</a>
    <a href="{{route('actionlogout')}}" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Log Out</a>


    </div>
</div>


<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="{{ asset('img/1.png') }}" style="width:100%;min-height:350px;max-height:600px;">
</div>

<!-- Team Container -->
<div class="w3-container w3-padding-64 w3-center" id="fitur">
  <h2>Fitur-Fitur</h2>
  <p>ISI KARTU ORDER - KEPEGAWAIAN - DATA TRANSAKSI (PEMBAYARAN)</p>

  <div class="w3-row-padding" style="display: flex; justify-content: space-between;">
    <div class="w3-quarter" style="display: flex; flex-direction: column; align-items: left;">
      <a class="nav-link active" aria-current="page" href="/index">
        <img src="{{ asset('img/2.png') }}" style="width:100%;min-height:350px;max-height:600px;">
      </a>
      <h3>FORMULIR PENGISIAN DATA PEMILIK</h3>
      <p>isi formulir & isi data pengujian</p>
    </div>

    <div class="w3-quarter" style="display: flex; flex-direction: column; align-items: center;">
      <a class="nav-link active" aria-current="page" href="pegawai/tampil">
        <img src="{{ asset('img/3.png') }}" style="width:100%;min-height:350px;max-height:600px;">
      </a>
      <h3>DATA KEPEGAWAIAN</h3>
      <p>Ubah Data Pegawai & Detail Pegawai</p>
    </div>

    <div class="w3-quarter" style="display: flex; flex-direction: column; align-items: right;">
      <a class="nav-link active" aria-current="page" href="/">
        <img src="{{ asset('img/4.png') }}" style="width:100%;min-height:350px;max-height:600px;">
      </a>
      <h3>DATA LAPORAN</h3>
      <p>Laporan Transaksi</p>
    </div>
  </div>
</div>

</body>
</html>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                
                </ul>
              </div>