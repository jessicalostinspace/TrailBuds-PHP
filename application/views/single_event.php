<?php require_once('header.php'); ?>


    <style>

      h3 {
        text-align: center;
      }

    </style>

    <div id="map" style="width: 100%; height: 300px;"></div>

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

// CAN ADD GEOCODING CAPABILITIES IN FUTURE

// var origin_coordinates;

// function geocode_center()
// {
//   $.get("https://maps.googleapis.com/maps/api/geocode/json?address=<?= $event['departure_location'] ?>&key=AIzaSyApbO-TW6-gkolVfdL1uKgqDCP2rC3fg2A", function(res) {
//       origin_coordinates = res['results'][0]['geometry']['location'];
//     }, 'json');
//   //console.log(origin_coordinates);

//   var center = new google.maps.LatLng(origin_coordinates['lat'], origin_coordinates['lon']);
//   return center;
// }

// initialize the map with line between the departure location and the hike location
function initMap() {

  var origin = "<?= $event['departure_location'] ?>";
  var destination = "<?= $event['hike_location'] ?>";

  var map = new google.maps.Map(document.getElementById('map'), {
    // center: center,
    scrollwheel: false,
    zoom: 8
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

// map takes up half of the window height
$(function () {
  $("#map").css("height", $(window).height() / 2);
});

</script>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApbO-TW6-gkolVfdL1uKgqDCP2rC3fg2A&callback=initMap">
    </script>



<?php require_once('footer.php'); ?>

