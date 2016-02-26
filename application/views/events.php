<?php require_once('header.php'); ?>




<body>
 <li id='hidden' class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
      <ul class="dropdown-menu">
      </ul>
    </li>

<div class='container'>
  <!-- Trigger the modal with a button -->
  <div id='apricot' class='container-fluid'>
     <div id='avocado' class="container">
      <div class='dropdown'>
        <button class="btn-lg dropdown-toggle" id='filter_btn' type="button" data-toggle="dropdown">Filter By
        <span style='color:white' class="caret"></span></button>
        <ul class="dropdown-menu">
          <li class="dropdown-header"><span class='glyphicon glyphicon-calendar green_glyph'> </span>  Departure Date</li>
          <li><a href="#" id='btn1' ><span class='glyphicon glyphicon-time green_glyph'></span>  Soonest</a></li>
          <li><a href="#" id='btn2' ><span class='glyphicon glyphicon-time green_glyph'></span>  Latest</a></li>
          <li class="divider"></li>
          <li class="dropdown-header"><span class='glyphicon glyphicon-user green_glyph'></span>  Spots Remaining</li>
          <li><a href="#" id='btn4' ><span class='glyphicon glyphicon-arrow-up green_glyph'></span>  Most</a></li>
          <li><a href="#" id='btn3' ><span class='glyphicon glyphicon-arrow-down green_glyph'></span>  Least</a></li>
          
          
        </ul>
      </div>
    </div>
    <div id='city_searchbar' class="form-group col-xs-7">
      <form id='searchform'>
        <input id="autocomplete" type="search" class="form-control input-lg" id="city" placeholder="Enter your city" autofocus>
      </form>
       <button type="button" class="btn btn-default btn-md" id="searchbtn"><span class="glyphicon glyphicon-search"></span></button>
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
          <h2><span style='color:white' class="glyphicon glyphicon-pencil"></span> Create Your Event</h2>
          
          
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
            <div class="form-group">
              <label for="psw10">*Provide an Imgur.com image URL (needs .jpg or .png format)</label>
              <input name='image_url' type="text" class="form-control" id="psw10" >
              <div><label id='pear'>Example: http://imgur.com/gallery/Z0siJAG</label></div>
              <?php
                if ($this->session->flashdata('departure_date_error')) {
                  echo "<div class='red'><p>" . $this->session->flashdata('image_url_error') . "</p></div>";
                }
              ?>
            </div>
      
              <button type="submit" id='button_submit_event' class="btn btn-success btn-block"><span style='color:white' class="glyphicon glyphicon-check"></span>Create Event</button>
          </form>
        </div>
        <div class="modal-footer">
        	
          <button type="submit" id='button_cancel_event' class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span style='color:white' class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#">Sign Up</a></p>
         

        </div>
      
      </div>
    </div>
  </div> 



<div id='orange' class='container'>
</div>



<script type='text/javascript'>
$(document).ready(function(){

	$.get('/events/display_all_events', function(res){
		$('#orange').html(res);
	});
	<?php
	if($this->session->flashdata('name_error')||$this->session->flashdata('hike_location_error')||$this->session->flashdata('distance_error')||$this->session->flashdata('duration_error')||$this->session->flashdata('departure_location_error')||$this->session->flashdata('departure_date_error')){ ?>
		$("#myModal").modal();
	<?php }
	?>
  $('.dropdown-toggle').dropdown();
	$('#myBtn').hover(
       function () {
          $(this).css({"background-color":"#FF7E17"});
       }, 
		
       function () {
          $(this).css({"background-color":"#005200"});
       }
    );
  $('#filter_btn').hover(
       function () {
          $(this).css({"background-color":"#FF7E17"});
       }, 
    
       function () {
          $(this).css({"background-color":"#005200"});
       }
    );
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
    
    
    $('#btn1').click(function(){
    	$.get('/events/display_soonest', function(res){
    		$('#orange').html(res);
    	});
    });
    $('#btn2').click(function(){
    	$.get('/events/display_latest', function(res){
    		$('#orange').html(res);
    	});
    });
    $('#btn3').click(function(){
    	$.get('/events/display_spots_least', function(res){
    		$('#orange').html(res);
    	});
    });
     $('#btn4').click(function(){
    	$.get('/events/display_spots_most', function(res){
    		$('#orange').html(res);
    	});
    });
     $('#autocomplete').keyup(function(){
     	var info= $(this).val();
     	$.post('/events/google', info, function(res){

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
	color:#FF7E17;
	margin-top: -3%;
	font-size: 12px;
	margin-bottom: 2%;
}
#uno {
	margin-top: 2%;
}

#peach{
  width: 16%;
	display: inline-block;
	vertical-align: bottom;
  margin-top: 1.2%;
  margin-left: 25%;	
}
.modal-header{
  background-color:#005200;
}
#myBtn{
    color: white;
    background-color: #005200;
    border: transparent;
    position: relative;
    right: 322px;
}
#mymodal{
  height:40em;
  overflow-y:scroll; 
}

#nectarine{
	font-weight: bold;
	display: inline-block;
	vertical-align: top;
}

#avocado{
	display: inline-block;
  /*margin-left: -2%;*/
  width: 16%;
  vertical-align: bottom;

}
.red {
  color: red;
}
.thumbnail {
  display: inline-block;
  vertical-align: top;
  margin-top: 5%;
  padding: 4%;
  padding-bottom: 2%;
  height: 33em;
  width: 100%;
  box-shadow: 0px 0px 15px #ddd;

}
.tree{
  height: 10em;
  border-radius: 10px;
  margin-left: -12%;
  width: 120%;
}
.caption {

  height: 10em;
  margin-bottom: -5%;
  margin-top: -1%;
  overflow-y: scroll;
  width: 28%;
  
}
.coconut {
  margin-bottom: 2%;
  
}
h4 {
	background-color: #49B64E;
}
*{
	color: #222222;
}
body{
	background-color:#f8f8f8;
  
}

#btn1{
  border-color:#005200; 
  color: #005200;
}
#btn2{
	 border-color:#005200; 
  color: #005200;
}
#btn3{
 border-color:#005200; 
  color: #005200;
}
#btn4{
	 border-color:#005200; 
  color: #005200;
}
#btn5{
  margin-left: 70%;
  background-color: #005200;
	border-color:#005200; 
  color: white;
}
#apricot{
  width: 105%;
  background-color: white;
  border: 1px solid lightgrey;
  height: 5em;
  margin-top: -0.5%;
  margin-left: -20%;
  position: fixed;
  padding-left:383px;
  z-index: 5;

}
#orange{
  margin-top: 5%;
}
#event_image, .caption{
  display: inline-block;
  vertical-align: top;
 
}
#events_top_div {
  margin-bottom: 5%;
  padding: 0px;
}
.smallbox{
  width:100%;

}
.longbox{
  width:100%;
}
#event_image {
  width: 15%;
}
#events_footer_div{
  height: 3em;
  width: 100%;
  margin-top: -2%;
}
#pear{
  font-weight: lighter;
}
.event_list_top{
  display: inline-block;
  vertical-align: top;
  width: 22.5%;
}
#list_spots{
  width: 30%;
}
.green_tooltip, .green_list{
  border-color:#005200;
}
.tooltip-inner {
    background-color: #005200;
}

.tooltip.top .tooltip-arrow {
    border-top-color: #005200;
}

.tooltip.right .tooltip-arrow {
    border-right-color: #005200;
}

.tooltip.bottom .tooltip-arrow {
    border-bottom-color: #005200;
}

.tooltip.left .tooltip-arrow {
    border-left-color: #005200;
}
#button_cancel_event{
  background-color:#FF7E17;
  border: transparent;
}
#button_submit_event{
  background-color: #005200;
  border: transparent;
}
#filter_btn{
  background-color: #005200;
  color: white;
  border: transparent;
}
.dropdown-header{
  color: #005200;
}
.green_glyph{
  color:#005200;
}
#hidden{
  margin-top: -1%;
  visibility: hidden;
}
#city_searchbar{
  display: inline-block;
  vertical-align: bottom;
  width: 44em;

  margin-top: 1%;
}
#searchbtn{
  height: 3.1em;
  display: inline-block;
  vertical-align: bottom;
}
#searchform{
  display: inline-block;
  vertical-align: bottom;
}
#autocomplete{
  width: 30em;
}

</style>



<?php require_once('footer.php'); ?>