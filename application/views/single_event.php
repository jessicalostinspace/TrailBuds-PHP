<?php require_once('header.php'); ?>
    <div id="map" style="width: 100%; height: 300px;"></div>

    <div class="container wrapper">
      <div class="row">
        <div class="col-sm-7">
          <h1><?= $event['name'] ?></h1>
          <hr>
          <p class="right"><strong>From:</strong>  <?= $event['departure_location'] ?></p>
          <p class="right"><strong>To:</strong>  <?= $event['hike_location'] ?></p>
          <p class="right"><strong>We'll be leaving: </strong>  <?= $event['departure_date'] ?></p>
          <p><strong>Distance:</strong> <?= $event['distance'] ?>mi</p>
          <p><strong>Elevation:</strong> <?= $event['elevation'] ?></p>
          <p><strong>Duration:</strong> <?= $event['duration'] ?> days</p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<?= $event['description'] ?>
          </p>
          <hr>
          <form id="event_message_form" action="/messages/create_event_message" method="post">
            <textarea name="message" class="form-control" rows="7" placeholder="Write a message..."></textarea>
            <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
            <input type="hidden" name="receiver_id" value="<?= $event['creator_id'] ?>">
            <input type="hidden" name="sender_id" value="<?= $current_user_id ?>">
            <button style="margin: 10px 0px" type="submit"  class="btn btn-success">Post message</button>
          </form>
          <div id="event_messages"></div>

        </div>
        <div class="sidebar col-sm-4 col-sm-offset-1">
          <form id="create_attendant" action="/attendees/create/" method="post">
            <input type="hidden" name="user_id" value="<?= $current_user_id ?>">
            <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
            <button type="submit"  class="btn btn-success">I want to go!</button>
          </form>
          <h4>People already going...</h4>
          <hr>
          <div id="attendees"></div>
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

// get all current attendants of this event and display them in the sidebar

  var attendees_url = '/attendees/show_all/' + <?= $event['id'] ?>;
  var current_attendants_output = '';
  $.get(attendees_url, function(res) {
    for (var i = 0; i < res.length; i++)
    {
      current_attendants_output += '<a href=/users/show_profile/' + res[i].id + '>';
      current_attendants_output += '<img src=' + res[i].picture_url + '>';
      current_attendants_output += ' ' + res[i].first_name + ' ' + res[i].last_name + '<br><hr>';
      current_attendants_output += '</a>';
    }
    $('#attendees').html(current_attendants_output);
  }, "json");

// MESSAGES REQUEST
  var event_messages_url = "/messages/index_html/<?= $event['id'] ?>"
  $.get(event_messages_url, function(res) {
    console.log(res);
    $('#event_messages').html(res);
  });

  $('#event_message_form').submit(function(){
    $.post("/messages/create_event_message", $(this).serialize(), function(res) {
      $('#event_messages').html(res);
    });
    return false;
  });



// if user presses I want to go button, create them as an attendant of the event
  // var create_attendant_url = "/create_attendee/<?= $event['id'] . '/' . $current_user_id ?>/";
  // console.log(create_attendant_url);
  // $('#create_attendant').submit(function() {
  //   $.post(create_attendant_url, $(this).serialize(), function(res) {
  //     console.log(res);
  //   }, "json");
  //   return false;
  // });
  // console.log(create_attendant_url);







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

