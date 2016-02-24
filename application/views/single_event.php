<?php require_once('header.php'); ?>


    <style>

      h3 {
        text-align: center;
      }

    </style>

    <div id="map" style="width: 100%; height: 300px;"></div>
   <!--  'id' => string '1' (length=1)
     'name' => string 'event' (length=5)
     'description' => string 'desc' (length=4)
     'hike_location' => string '113 hrhr rd' (length=11)
     'departure_location' => string '249 ohfe rd' (length=11)
     'duration' => string '2' (length=1)
     'distance' => string '3' (length=1)
     'elevation' => string '100' (length=3)
     'departure' => string '2016-02-23 20:12:52' (length=19)
     'created_at' => string '2016-02-23 20:12:52' (length=19)
     'updated_at' => string '2016-02-23 20:13:09' (length=19)
     'drive' => null
     'attendees' => null -->

    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
        <h3><?= $event['name']?></h3>
        <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <?= $event['description'] ?>
          <hr>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          From: <?= $event['departure_location'] ?>
          To: <?= $event['hike_location'] ?>
          <hr>
        </div>
      </div>
    </div>
<script>



function initMap() {
  var origin = "Chicago, IL";
  var destination = "Los Angeles, CA";

  var map = new google.maps.Map(document.getElementById('map'), {
    // center: origin,
    scrollwheel: false,
    zoom: 7
  });

  var directionsDisplay = new google.maps.DirectionsRenderer({
    map: map
  });

  // Set destination, origin and travel mode.
  var request = {
    destination: destination,
    origin: origin,
    travelMode: google.maps.TravelMode.DRIVING
  };

  // Pass the directions request to the directions service.
  var directionsService = new google.maps.DirectionsService();
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      // Display the route on the map.
      directionsDisplay.setDirections(response);
    }
  });
}

$(function () {
  $("#map").css("height", $(window).height() / 2);
});

</script>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApbO-TW6-gkolVfdL1uKgqDCP2rC3fg2A&callback=initMap">
    </script>



<?php require_once('footer.php'); ?>

