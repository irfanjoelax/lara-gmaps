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

    <script>
      // Initialize and add the map
      function initMap() {
        // The location of setPlace
        var setPlace = [
          ['UNU Kaltim', -0.5411973583333433, 117.13133811950684],
          ['POLNES', -0.532829233783296, 117.12374210357666],
          ['Cronulla Beach', -0.5439438172165648, 117.12618827819824]
        ];
        
        // The map, centered at setPlace
        var map = new google.maps.Map(
            document.getElementById('map'), 
            {
              zoom: 15, 
              center: {
                lat: -0.5411973583333433, lng: 117.13133811950684
              }
            }
        );

        var marker, i;

        for (i = 0; i < setPlace.length; i++) {  
          marker = new google.maps.Marker({
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
  </body>
</html>