<?php



?>
<table class='table-bordered'>
	<thead>
		<tr>
		<th>Event Name</th>
		<th>Description</th>
		<th>Hike Location</th>
		<th>Distance</th>
		<th>Duration</th>
		<th>Elevation Gain</th>
		<th>Meeting Location</th>
		<th>Max Attendees</th>
		<th>Departure Date</th>
	</tr>
	<thead>
	<tbody>
		<?php

		foreach ($events as $event) {
			
			$date=strtotime($event['departure_date']);
			
			$date1 = date('F d, Y',$date);
			
			
			echo "<tr>";
			echo "<td>" . "<a href='/show/". $event['id'] . "'>" . $event['name'] . '</a></td>';
			echo "<td>" . $event['description'] . '</td>';
			echo "<td>" . $event['hike_location'] . '</td>';
			echo "<td>" . $event['distance'] . '</td>';
			echo "<td>" . $event['duration'] . '</td>';
			echo "<td>" . $event['elevation'] . '</td>';
			echo "<td>" . $event['departure_location'] . '</td>';
			echo "<td>" . $event['attendees'] . '</td>';
			echo "<td>" . $date1 . '</td>';
			echo "</tr>";
		} 

		?>
	</tbody>
</table>	
		