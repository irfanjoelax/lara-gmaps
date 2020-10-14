@extends('adminlte::page')

@section('title', 'Laragmaps | Maps Lokasi')

@section('content_header')
    <h1>
      Lokasi Maps Page
    </h1>
@stop

@section('content')
<div class="row">
    <div class="col-md">
        <div class="card card-prirary cardutline direct-chat direct-chat-primary">
            <div class="card-header">
                Count Lokasi Point: <b>{{ $countLokasi }}</b>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div id="map"></div>
            </div>
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
      // The location of setPlace
      var setPlace = [
        {!! $lokasi !!}
      ];
      
      // The map, centered at setPlace
      var map = new google.maps.Map(
          document.getElementById('map'), 
          {
            zoom: 10, 
            center: {
              lat: -1.1742562, lng: 116.7016585
            }
          }
      );

      for (var i = 0; i < setPlace.length; i++) {  
        var marker = new google.maps.Marker({
          position: {
            lat: setPlace[i][1], lng: setPlace[i][2]
          },
          map: map
        });
      }
    }
</script>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoQtbiJDff-uYtc2jZQNQPjj37eheqs10&callback=initMap">
</script>
@stop