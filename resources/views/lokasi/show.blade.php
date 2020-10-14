@extends('adminlte::page')

@section('title', 'Laragmap | Lokasi')

@section('content_header')
    <h1>Lokasi Show Page</h1>
    <h3>{{ $lokasi->nm_lks }}</h3>
@stop

@section('content')
  <div class="row">
    <div class="col-md">
      <div class="card">
        <div id="map"></div>
      </div>
      <div class="card-footer">
        <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
  </div>
@stop

@section('css')
<style>
    /* Set the size of the div element that contains the map */
   #map {
     height: 400px;  /* The height is 400 pixels */
     width: 100%;  /* The width is the width of the web page */
    }
 </style>
@stop

@section('js')
<script>
  // Initialize and add the map
  function initMap() {  
    var setPlace = {
      lat: {!! $lokasi->lat_lks !!}, lng: {!! $lokasi->lng_lks !!}
    };
    
    // The map, centered at setPlace
    var map = new google.maps.Map(
        document.getElementById('map'), 
        {
          zoom: 18, 
          center: setPlace
        }
    );
    
    // The marker, positioned at setPlace
    var marker = new google.maps.Marker({
      position: setPlace, 
      map: map
    });
  };
</script>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoQtbiJDff-uYtc2jZQNQPjj37eheqs10&callback=initMap">
</script>
@stop

