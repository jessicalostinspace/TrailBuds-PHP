
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
	    					<!-- <h5>Messages</h5> -->
	    					<td><a id="view_chat" href="#"><?= $message['first_name']." ".$message['last_name'] ?></a></td>
	    					<td><?= $message['updated_at']?></td>
	    				</tr>
	    			<?php
	    			}?>
	    	</table>	
	    </div>
	 	<!-- <div class="col-md-3"></div> -->
 	<!-- </div> -->
<!-- </div> -->

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="privateMsgModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal_header"><span class="glyphicon glyphicon-user"></span> Chat history with <?= $messages['first_name'] ?></h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
        			<?php
           	    	foreach($messages as $message)
	    			{ ?>
	    				<div class="borders">
		    				<p>
		    					<a href="/users/show_profile/<?= $message['id']?>">
			    					<img src="<?= $message['picture_url'] ?>">
				    				<?= $message['first_name']." ".$message['last_name'] ?>
			    				</a>
		    				</p>
		    				<p><?= $message['updated_at'] ?></p>
		    				<p><?= $message['content'] ?></p>
	    				</div>
	    			<?php
	    			}?>

            <form id="reply" action="/messages/createPersonal" method="post" role="form">
	            <div class="form-group">
		            <label for="usrname"><span class="glyphicon glyphicon-tree-conifer"></span> Reply</label>
		            <textarea class="form-control" name="content" id="" placeholder="Enter message..."></textarea>
		            <!-- <input type="hidden" name="receiver_id" value="#"></input> -->
	            </div>
	              <button type="submit" class="location_btn btn btn-success btn-block"><span class="glyphicon glyphicon-tree-deciduous"></span> Submit</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

        </div>
      </div>
      
    </div>
  </div> 
</div>