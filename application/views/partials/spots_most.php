<?php



?>
<div class="row">
		<?php

		foreach ($events as $event) {
			
			$date=strtotime($event['departure_date']);
			
			$date1 = date('m/d/y',$date);
			
			
			?>

			
			  <div class="col-sm-6 col-md-6">
			    <div class="thumbnail">
		    	<div class='container' id='events_top_div'>
		    	<div class='container'   id='event_image'>
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
			        <h3><a href=<?php echo "'/show/" . $event['id'] . "'" ?>><?php echo $event['name'] ?> </a></h3>
			        <p><?php echo $event['description'] ?></p> 
			      </div>
			  	</div>
			      <div class='coconut'>
			      	<div id='smallbox' class="list-group">
  						<a href="#" style='height:3em'class="list-group-item event_list_top"><?php echo "<p><span class='glyphicon glyphicon-user'></span>  " . $event['attendees_remaining'] . " spots left</p>"?></a>
  						<a href="#" style='height:3em'class="list-group-item event_list_top"><?php echo "<p><span class='glyphicon glyphicon-road'></span>  " . $event['distance'] . " miles</p>"?></a>
  						<a href="#" style='height:3em'class="list-group-item event_list_top"><?php echo "<p><span class='glyphicon glyphicon-time'></span>  " . $event['duration'] . " hours</p>"?></a>
  						<a href="#" style='height:3em'class="list-group-item event_list_top"><?php echo "<p><span class='glyphicon glyphicon-picture'></span>  " . $event['elevation'] . " ft</p>"?></a>
			      	</div>
					<div id='longbox' class="list-group">
  						<a href="#" style='height:3em'class="list-group-item"><?php echo "<p><span style='font-weight:bold'>Hike Location: </span>" . $event['hike_location'] . "</p>"?></a>
  						<a href="#" style='height:3em'class="list-group-item"><?php echo "<p><span style='font-weight:bold'>Departure Location: </span>" . $event['departure_location'] . "</p>"?></a>
  						<a href="#" style='height:3em'class="list-group-item"><?php echo "<p><span style='font-weight:bold'>Departure Date: </span>" . $date1 . "</p>"?></a>
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