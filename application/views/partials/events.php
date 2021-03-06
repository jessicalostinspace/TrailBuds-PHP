<?php


?>
		
		<div id='special'><h5><?php echo 'Showing Results for ' . $origin . "..."?></h5></div>	
		<?php

		foreach ($events as $event) {
			
			$date=strtotime($event['departure_date']);
			
			$date1 = date('m/d/y',$date);
			
			
			?>
			<script type="text/javascript">
			<?php
			unset($location1);
			unset($location);
			unset($origin1);
			unset($origin_point);
			$location1=str_replace(',', '', $event['hike_location']); 
			$location=str_replace(' ', '', $location1); 
			$origin1=str_replace(',', '', $origin);
			$origin_point=str_replace(' ', '', $origin1); 
			?>

			$(document).ready(function(){
				$.get(<?php echo "'/distance/" . $location ."/" . $origin_point . "'" ?>, function(res){
					$(<?php echo "'#longbox" . $event['id'] . "'"?>).append("<a href='#' style='height:3em'class='list-group-item green_list'><p><span style='font-weight:bold'>Distance Away: </span>" + res.rows[0].elements[0].distance.text + "</p></a>")
				}, 'json');
			});


		</script>
			
			  <div class="col-sm-4 col-md-6">
			    <div class="thumbnail">
		    	<div class='container' id='events_top_div'>
		    	<div class='container' id='event_image'>
			      <?php 
			      	if ($event['image_url']===NULL) {
			      		echo "<img class='tree' src='http://i.imgur.com/UzXt2Uw.png'>";
			      	}
			      	else {
			      		echo "<img class='tree' src='" . $event['image_url'] . "' alt='http://i.imgur.com/UzXt2Uw.png'>";
			      	}
			      ?>
			  		</div>
			      <?php //were going to want to set a variable for image here, need to add that to the events database and the create event modal ?>
			      <div class="caption">
			        <h3><a href=<?php echo "'/show/" . $event['id'] . "/" . $origin_point . "'" ?>><?php echo $event['name'] ?> </a></h3>
			        <p><?php echo $event['description'] ?></p> 
			      </div>
			  	</div>
			      <div class='coconut'>
			      	<div class="list-group smallbox">

			      		<a style='height:3em'class="list-group-item event_list_top green_tooltip" id='list_spots' data-html='true' data-toggle="tooltip" title='<?php echo 'Max Attendees: ' . $event['attendees'] . '</br>Spots Remaining: ' . $event['attendees_remaining']?> '><?php echo "<p><span class='glyphicon glyphicon-user'></span>  " . $event['attendees_remaining'] . " spots left</p>"?></a>
			      		<a style='height:3em'class="list-group-item event_list_top green_tooltip" data-toggle="tooltip" title='<?php echo 'Hike Distance: ' . $event['distance'] . ' miles' ?> '><?php echo "<p><span class='glyphicon glyphicon-road'></span>  " . $event['distance'] . " miles</p>"?></a>
			      		<a style='height:3em'class="list-group-item event_list_top green_tooltip" data-toggle="tooltip" title='<?php echo 'Hike Duration: ' . $event['duration'] . ' hours' ?> '><?php echo "<p><span class='glyphicon glyphicon-time'></span>  " . $event['duration'] . " hours</p>"?></a>
			      		<a style='height:3em'class="list-group-item event_list_top green_tooltip" data-toggle="tooltip" title='<?php echo 'Hike Elevation: ' . $event['elevation'] . ' ft' ?> '><?php echo "<p><span class='glyphicon glyphicon-picture'></span>  " . $event['elevation'] . " ft</p>"?></a>
  						
			      	</div>
					<div id=<?php echo "'longbox" . $event['id'] . "'"?>class="list-group longbox">
  						<a href="#" style='height:3em'class="list-group-item green_list"><?php echo "<p><span style='font-weight:bold'>Hike Location: </span>" . $event['hike_location'] . "</p>"?></a>
  						<a href="#" style='height:3em'class="list-group-item green_list"><?php echo "<p><span style='font-weight:bold'>Departure Location: </span>" . $event['departure_location'] . "</p>"?></a>
  						<a href="#" style='height:3em'class="list-group-item green_list"><?php echo "<p><span style='font-weight:bold'>Departure Date: </span>" . $date1 . "</p>"?></a>
			      	</div>
			      	</div>
			      	<div id='events_footer_div' class='container'>
			      	<p><a href=<?php echo "'/show/" . $event['id'] . "'" ?>class="btn btn-md" id='btn5' role="button"><span style='color:white' class="glyphicon glyphicon-search"></span>   Event Details</a></p>
			      </div>
			    </div>
			  </div>
			
	<?php 	} 

		?>
</div>
<script type='text/javascript'>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();

  });
</script>




		