@extends('adminlte::page')

@section('title', 'Laragmaps | Home')

@section('content_header')
    <h1>
      Home Page
    </h1>
@stop

@section('content')
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $countLokasi }}</h3>
        <p>Data Lokasi</p>
      </div>
      <div class="icon">
        <i class="fa fa-map-marked-alt"></i>
      </div>
      <a href="{{ route('lokasi.index') }}" class="small-box-footer">lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
@stop
