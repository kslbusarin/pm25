<!DOCTYPE html>
<html>
  <head>
    <title>Dust</title>
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <meta charset="utf-8">
    <style>
      
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
        margin:10px;
        
           }
      /* Optional: Makes the sample page fill the window. */
      html {
        height: 100%;
        margin: 0;
        padding: 0;
    text-align: center;
      }

      #map {
        height: 400px;
        width: 700px;
      }

    </style>
  </head>
  <body>

    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Dust</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="historyData.php">ข้อมูลย้อนหลัง</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<div class="container">
  <div class="row">
    <div class="col">
      
  <div id="map"></div>
    <script> 

      setInterval(function () {
        initMap();
    },600000);

      function initMap() {
      var mapOptions = {
        center: {lat: 13.847860, lng: 100.604274},
        zoom: 12,
      }
      var maps = new google.maps.Map(document.getElementById("map"),mapOptions);
      var marker, info;
      $.getJSON( "json.php", function( jsonObj ) {
          //*** loop
          $.each(jsonObj, function(i, item){
            if (item.pm25 <= 25) {
              marker = new google.maps.Marker({
              animation: google.maps.Animation.DROP,
               position: new google.maps.LatLng(item.lo_lat, item.lo_lng),
               map: maps,
               icon:"image/blue.png"               
            });
            }
            else if (item.pm25 > 25 && item.pm25 <= 50) {
              marker = new google.maps.Marker({
              animation: google.maps.Animation.DROP,
               position: new google.maps.LatLng(item.lo_lat, item.lo_lng),
               map: maps,
               icon:"image/green.png"               
            });
            }
            else if (item.pm25 > 50 && item.pm25 <= 100) {
              marker = new google.maps.Marker({
              animation: google.maps.Animation.DROP,
               position: new google.maps.LatLng(item.lo_lat, item.lo_lng),
               map: maps,
               icon:"image/yellow.png"               
            });
            }
            else if (item.pm25 > 100 && item.pm25 <= 200) {
              marker = new google.maps.Marker({
              animation: google.maps.Animation.DROP,
               position: new google.maps.LatLng(item.lo_lat, item.lo_lng),
               map: maps,
               icon:"image/orang.png"               
            });
            }
            else if (item.pm25 > 200) {
              marker = new google.maps.Marker({
              animation: google.maps.Animation.DROP,
               position: new google.maps.LatLng(item.lo_lat, item.lo_lng),
               map: maps,
               icon:"image/red.png"               
            });
            }

            info = new google.maps.InfoWindow();

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
             /*
              if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
              }else{
                marker.setAnimation(google.maps.Animation.BOUNCE);
              }
              */

              info.setContent(item.locate_name+" PM2.5= "+item.pm25);
              info.open(maps, marker);
            }
            })(marker, i));

          }); // loop
       });
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAQC9jkVVjmaYV5cO8jWwB-c9rB8taJlk&callback=initMap"></script> 
    <img src="image/pm.png" class="img-fluid" alt="Responsive image">
    </div>

    <div class="col">
      <form action="insert.php" name="frmMain" method="post" target="iframe_target">
    
      New Location:
    
      <input class="form-control" type="text" name="locate_name" placeholder="Location Name">
      <input class="form-control" type="text" name="lo_number" placeholder="Location ID">
      <input class="form-control" type="text" name="lo_lat" placeholder="Latitude">
      <input class="form-control" type="text" name="lo_lng" placeholder="Longitude">
      <input class="btn btn-primary" type="submit" value="Submit">
      
      </form> 
      
    </div>
  </div>
</div>    
  </body>
</html>