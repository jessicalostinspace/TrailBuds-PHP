


<!-- <div class="container"> -->
	<!-- <div class="row"> -->
	 	<!-- <div class="col-md-3"></div> -->
	 	<div class="col-md-1"></div>
	    <div class="ajaxmsg borders col-md-6">
	    	<h1 class="forest">Messages</h1>
	    	<p></p>
	    	<table class="table table-bordered table-hover">
	    		<thead>
	    			<tr>
	    				<td>From</td>
	    				<td>Last Activity</td>
	    			</tr>
	    		</thead>
	    		<?php
	    		foreach($messages as $message)
	    			{ ?>
	    				<tr>
	    					<td><a href="/users/show_profile/<?= $message['id']?>"><?= $message['first_name']." ".$message['last_name'] ?></a></td>
	    					<td><?= $message['updated_at']?></td>
	    				</tr>
	    			<?php
	    			}?>
	    	</table>	
	    </div>
	 	<!-- <div class="col-md-3"></div> -->
 	<!-- </div> -->
<!-- </div> -->

