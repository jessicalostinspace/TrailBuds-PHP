<?php



?>
<table>
	<thead>
		<th>Event Name</th>
		<th>Description</th>
		<th>Hike Location</th>
		<th>Distance</th>
		<th>Duration</th>
		<th>Elevation Gain</th>
		<th>Meeting Location</th>
		<th>Max Attendees</th>
		<th>Departure Date</th>
	<thead>
	<tbody>
		<?php
		foreach ($events as $event) {
			echo "<tr>";
			foreach ($event as $value) {
				echo "<td>" . $value . "</td>";
			}
			echo "</tr>";
		}

		?>
	</tbody>
</table>	
		