@extends('homemenu')

@section('konten')
  <h4>Selamat Datang <b>{{Auth::user()->name}}</b>, Anda Login sebagai <b>{{Auth::user()->role}}</b>.</h4>

  <a href="pegawai/tampil" class="btn btn-primary" >Edit Pegawai</a>




@endsection