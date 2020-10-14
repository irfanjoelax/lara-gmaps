<!DOCTYPE html>
<html>
  <head>
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
      }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <p id="latitude"></p>
    <p id="longitude"></p>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of setPlace
        var setPlace = {
          lat: -0.5411973583333433, lng: 117.13133811950684
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

        document.getElementById("latitude").innerHTML = setPlace.lat;
        document.getElementById("longitude").innerHTML = setPlace.lng;

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
        document.getElementById("latitude").innerHTML = latitude;
        document.getElementById("longitude").innerHTML = longitude;

        map.addListener("click", (e) => {
          // remove old marker
          marker.setMap(null);
        });
      }
    </script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoQtbiJDff-uYtc2jZQNQPjj37eheqs10&callback=initMap">
    </script>
  </body>
</html>