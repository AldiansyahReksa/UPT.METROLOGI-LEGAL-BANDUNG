<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  <div class="container">
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary mb-2" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">UPT. METROLOGI LEGAL KOTA BANDUNG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Halaman Utama</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/kartu/form">Isi Formulir Pemilik </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/kartu/find">Lihat Kartu Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pengujian">Pengujian</a>
            </li>
          </ul>
        </div>
    </nav>
    <h1 class="mb-2">{{ $title }}</h1>
    <hr />
    {{ $slot }}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </div>
</body>

</html>