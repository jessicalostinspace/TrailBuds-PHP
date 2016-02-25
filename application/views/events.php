<?php require_once('header.php'); ?>


<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
 
  <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>
</head>
<body>
	


<div class="container">
  <!-- Trigger the modal with a button -->
  <div id='apricot' class='container-fluid'>
    <div id='avocado' class='container'>
	<h5>Filter By:</h5>
	<div class="btn-group">
	<button type="button" id='btn0' class="btn btn-info">Closest to You</button>
    <button type="button" id='btn1' class="btn btn-primary">Soonest</button>
    <button type="button" id='btn2' class="btn btn-danger">Latest</button>
    <button type="button" id='btn3' class="btn btn-info">Least Spots Remaining</button>
    <button type="button" id='btn4' class="btn btn-warning">Most Spots Remaining</button>
	</div>
  </div>
 <div id='peach'>
  <button type="button" class="btn btn-default btn-lg" id="myBtn"><span style='color:white' class="glyphicon glyphicon-plus"></span>  Create An Event</button>
</div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div id='mymodal' class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-pencil"></span> Create Your Event</h4>
          
          
        </div>
        <div class="modal-body" style="padding:40px 50px;">
        <div id='banana'><label id='banana'>*required</label></div>
          <form role="form" method='post' action='/events/create'>
            <div class="form-group">
              <label for="usrname">*Name</label>
              <input name='name' type="text" class="form-control" id="usrname" placeholder="Event Name">
          	<?php
				if ($this->session->flashdata('name_error')) {
					echo "<div class='red'><p>" .  $this->session->flashdata('name_error') . "</p></div>";
				}
			?>
          
            </div>
            <div class="form-group">
              <label for="psw1"></span>Description</label>
              <input name='description' type="text" class="form-control" id="psw1" placeholder="Enter a description">
               <?php
				if ($this->session->flashdata('description_error')) {
					echo "<div class='red'><p>" . $this->session->flashdata('description_error') . "</p></div>";
				}
			?>
            </div>
            <div class="form-group">
              <label for="psw2"></span>*Hike Location</label>
              <input name='hike_location' type="text" class="form-control" id="autocomplete" onFocus='geolocate()' placeholder="Hike Location">
              <div id='starfruit'></div>
            <?php
				if ($this->session->flashdata('hike_location_error')) {
					echo "<div class='red'><p>" . $this->session->flashdata('hike_location_error') . "</p></div>";
				}
			?>
            </div>
            <div class="form-group">
              <label for="psw6">*Meeting Location</label>
              <input name='departure_location' type="text" class="form-control" id="psw6" placeholder="Meeting Address">
             <?php
				if ($this->session->flashdata('departure_location_error')) {
					echo "<div class='red'><p>" . $this->session->flashdata('departure_location_error') . "</p></div>";
				}
			?>
            </div>
              <div class="form-group">
              <label for="psw3"></span>*Hike Distance</label>
              <input name='distance' type="text" class="form-control" id="psw3" placeholder="Miles">
             <?php
				if ($this->session->flashdata('distance_error')) {
					echo "<div class='red'><p>" . $this->session->flashdata('distance_error') . "</p></div>";
				}
			?>
            </div>
             <div class="form-group">
              <label for="psw4">*Hike Duration</label>
              <input name='duration' type="text" class="form-control" id="psw4" placeholder="Hours">
             <?php
				if ($this->session->flashdata('duration_error')) {
					echo "<div class='red'><p>" . $this->session->flashdata('duration_error') . "</p></div>";
				}
			?>
            </div>
             <div class="form-group">
              <label for="psw5">Elevation Gain</label>
              <input name='elevation' type="text" class="form-control" id="psw5" placeholder="Feet">
            </div>
            
             <div class="form-group">
              <label for="psw7">Can You Drive?</label></br>
		        <div class="col-sm-9">
		            <div class="btn-group" data-toggle="buttons">
		                <label class="btn btn-default">
		                    <input name='drive' type="radio" id="psw7" value="Yes" checked/> Yes
		                </label> 
		                <label class="btn btn-default">
		                    <input name='drive' type="radio" id="q157" value="No" /> No
		                </label> 
		            </div>
		        </div>
		   	</div></br>
             <div class="form-group">
              <label id='uno' for="psw8">Max Attendees</label>
              <input name='attendees' type="text" class="form-control" id="psw8" placeholder="#">
            </div>
             <div class="form-group">
              <label for="psw9">*Departure Date</label>
              <input name='departure_date' type="date" class="form-control" id="psw9" >
            <?php
				if ($this->session->flashdata('departure_date_error')) {
					echo "<div class='red'><p>" . $this->session->flashdata('departure_date_error') . "</p></div>";
				}
			?>
            </div>
           
      
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-check"></span>Create Event</button>
          </form>
        </div>
        <div class="modal-footer">
        	
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#">Sign Up</a></p>
         

        </div>
      
      </div>
    </div>
  </div> 
</div>


<div id='orange' class='container'>
</div>



<script type='text/javascript'>
$(document).ready(function(){
	$('#image_container').css('height', $(window).height()/2);
	$.get('/events/display_all_events', function(res){
		$('#orange').html(res);
	});
	<?php
	if($this->session->flashdata('name_error')||$this->session->flashdata('hike_location_error')||$this->session->flashdata('distance_error')||$this->session->flashdata('duration_error')||$this->session->flashdata('departure_location_error')||$this->session->flashdata('departure_date_error')){ ?>
		$("#myModal").modal();
	<?php }
	?>
	$('#myBtn').hover(
       function () {
          $(this).css({"background-color":"#00AEFF"});
       }, 
		
       function () {
          $(this).css({"background-color":"#0173C7"});
       }
    );
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
    $('#btn0').click(function(){
    	$.get('/events/display_soonest', function(res){
    		$('#orange').html(res);
    		$('h4').css({"background-color":"#49B64E"});
    	});
    });
    $('#btn1').click(function(){
    	$.get('/events/display_soonest', function(res){
    		$('#orange').html(res);
    		$('h4').css({"background-color":"#0173C7"});
    	});
    });
    $('#btn2').click(function(){
    	$.get('/events/display_latest', function(res){
    		$('#orange').html(res);
    		$('h4').css({"background-color":"#00AEFF"});
    	});
    });
    $('#btn3').click(function(){
    	$.get('/events/display_spots_least', function(res){
    		$('#orange').html(res);
    		$('h4').css({"background-color":"#005200"});
    	});
    });
     $('#btn4').click(function(){
    	$.get('/events/display_spots_most', function(res){
    		$('#orange').html(res);
    		$('h4').css({"background-color":"#222222"});
    	});
    });
     $('#autocomplete').keyup(function(){
     	var info= $(this).val();
     	$.post('/events/google', info, function(res){
     		console.log(info);
     		console.log(res.predictions[0].description);

     		var one=res.predictions[0].description;
     		var new_html="<p id='nectarine'>" + one + "</p>";
     		
     		$('#starfruit').html(new_html);
     	});
     });
   

 });
</script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApbO-TW6-gkolVfdL1uKgqDCP2rC3fg2A&libraries=places">
    </script>
    <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApbO-TW6-gkolVfdL1uKgqDCP2rC3fg2A&signed_in=true&libraries=places&callback=initAutocomplete"
        async defer></script>
</body>
</html>
<style type="text/css">

#banana{
	color:red;
	margin-top: -3%;
	font-size: 12px;
	margin-bottom: 2%;
}
#uno {
	margin-top: 2%;
}
.red {
	color: red;
}

#peach{
	margin-left: 10%;
	display: inline-block;
	width: 16%;
	vertical-align: bottom;
	
}
#myBtn{
	color:white;
	background-color: #0173C7;
	
}

#nectarine{
	font-weight: bold;
	display: inline-block;
	vertical-align: top;
}

#avocado{
	display: inline-block;
	vertical-align: bottom;
	width: 60%;
}

.thumbnail {
	display: inline-block;
	vertical-align: top;
	margin-top: 5%;
	padding: 4%;
	border:1px solid grey;
	padding-bottom: 2%;

}
.tree{
	margin-bottom: -5%;
	border-radius: 10px;
	
}
.caption {
	padding: 0px;
	height: 10em;
	margin-bottom: -5%;
	overflow: scroll;
	
}
.coconut {
	overflow: scroll;
	height: 10em;
	border-top: 1px solid #00AEFF;
	border-bottom: 1px solid #00AEFF;
	margin-bottom: 2%;
	
}
h4 {
	background-color: #49B64E;
}
*{
	color: #222222;
}
body{
	background: url('http://i.imgur.com/hkqRlDm.png');
  
}
#btn0{
	background-color: #49B64E;
	border: transparent;

}
#btn1{
	background-color: #0173C7;
	border: transparent;
}
#btn2{
	background-color: #00AEFF;
	border: transparent;
}
#btn3{
	background-color: #005200;
	border: transparent;
}
#btn4{
	background-color: #222222;
	border: transparent;
}
#btn5{
	background-color: #0173C7;
	color: white;
	margin-top: 3%;
}
#apricot{
  width: 113%;
  background-color: white;
  border-bottom: 1px solid gray;
  height: 6em;
  margin-left: -6.1%;
  margin-top: -2%;
  padding-top: .5%;
  position: fixed;
  z-index: 5;
  padding-left: 5%;
}
#orange{
  margin-top: 5%;
}

</style>



<?php require_once('footer.php'); ?>