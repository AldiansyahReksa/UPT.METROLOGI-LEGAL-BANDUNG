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

<!-- Contact Container -->
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p>Swing by for a cup of coffee, or whatever.</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Chicago, US</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  +00 1515151515</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  test@test.com</p>
    </div>

  </div>
</div>

<!-- Image of location/map -->
<img src="/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width:100%;">

<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
  <h4>Follow Us</h4>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-instagram"></i></a>
  <a class="w3-button w3-large w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>

  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>   
    <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
</footer>

<script>
// Script for side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "300px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}

// Close side navigation
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                
                </ul>
              </div>