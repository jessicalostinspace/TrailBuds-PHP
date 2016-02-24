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
	<?php $id=1 ?>
	<a href=<?= "'/show/" . $id . "'" ?>>Show</a>


<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-default btn-lg" id="myBtn">Create An Event</button>

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
            </div>
            <div class="form-group">
              <label for="psw2"></span>*Hike Location</label>
              <input name='hike_location' type="text" class="form-control" id="psw2" placeholder="Hike Location">
            <?php
				if ($this->session->flashdata('hike_location_error')) {
					echo "<div class='red'><p>" . $this->session->flashdata('hike_location_error') . "</p></div>";
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
              <label for="psw6">*Meeting Location</label>
              <input name='departure_location' type="text" class="form-control" id="psw6" placeholder="Meeting Address">
             <?php
				if ($this->session->flashdata('departure_location_error')) {
					echo "<div class='red'><p>" . $this->session->flashdata('departure_location_error') . "</p></div>";
				}
			?>
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
	$.get('/events/display_all_events', function(res){
		$('#orange').html(res);
	});
	<?php
	if($this->session->flashdata('name_error')||$this->session->flashdata('hike_location_error')||$this->session->flashdata('distance_error')||$this->session->flashdata('duration_error')||$this->session->flashdata('departure_location_error')||$this->session->flashdata('departure_date_error')){ ?>
		$("#myModal").modal();
	<?php }
	?>
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });

   
});
</script>

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

</style>



<?php require_once('footer.php'); ?>