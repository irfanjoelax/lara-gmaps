@extends('adminlte::page')

@section('title', 'Laragmap | Lokasi')

@section('content_header')
    <h1>Lokasi Edit Page</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('lokasi.update', ['lokasi'=>$lokasi->id_lks]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="nama">
                Nama Lokasi<sup class="text-danger">*</sup>
              </label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $lokasi->nm_lks }}">
              @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group row">
              <div class="col">
                <input type="text" name="latitude" id="latitude" class="form-control @error('latitude') is-invalid @enderror" value="{{ $lokasi->lat_lks }}">
                @error('latitude')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="col">
                <input type="text" name="longitude" id="longitude" class="form-control @error('longitude') is-invalid @enderror" value="{{ $lokasi->lng_lks }}">
                @error('longitude')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <div class="col">
                <div id="map"></div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-save"></i>&nbsp;Simpan
                </button>
                <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">
                  <i class="fa fa-undo"></i>&nbsp;Kembali
                </a>
              </div>
            </div>
          </form>
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
    var setPlace = {
      lat: {!! $lokasi->lat_lks !!}, lng: {!! $lokasi->lng_lks !!}
    };
    
    // The map, centered at setPlace
    var map = new google.maps.Map(
        document.getElementById('map'), 
        {
          zoom: 15, 
          center: setPlace
        }
    );

    // The marker, positioned at setPlace
    var marker = new google.maps.Marker({
      position: setPlace, 
      map: map
    });

    document.getElementById("latitude").value = setPlace.lat;
    document.getElementById("longitude").value = setPlace.lng;

    map.addListener("click", (e) => {
      setMarker(e.latLng, map, marker);
    });
  }

  function setMarker(latLng, map, oldMarker) {
    // remove old marker
    oldMarker.setMap(null);

    // create new marker
    var marker = new google.maps.Marker({
      position: latLng,
      map: map,
    });

    // set latitude & longitude location
    var stringLatLng  = latLng.toString();
    var strLatLng     = stringLatLng.split(',', 2);
    var strLat        = strLatLng[0].split('(', 2);
    var strLng        = strLatLng[1].split(')', 2);
    var latitude      = strLat[1];
    var longitude     = strLng[0];
    console.log(strLng);

    // set value latitude & longitude in HTML
    document.getElementById("latitude").value = latitude;
    document.getElementById("longitude").value = longitude;

    map.addListener("click", (e) => {
      // remove old marker
      marker.setMap(null);
    });
  }
</script>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoQtbiJDff-uYtc2jZQNQPjj37eheqs10&callback=initMap">
</script>
@stop

