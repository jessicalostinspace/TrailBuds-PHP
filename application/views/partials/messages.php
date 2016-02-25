
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
	    					<td><button class="view_chat"><?= $message['first_name']." ".$message['last_name'] ?></button></td>
	    					<td><?= $message['updated_at']?></td>
	    				</tr>
	    			<?php
	    			}?>
	    	</table>	
	    </div>
	 	<!-- <div class="col-md-3"></div> -->
 	<!-- </div> -->
<!-- </div> -->
<style type="text/css">
.modal .modal-body {
    max-height: 350px;
    overflow-y: auto;
}
</style>

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="privateMsgModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal_header"><span class="glyphicon glyphicon-comment"></span> Chat history with  <?= $messages[0]['first_name'] ?>
          </h4>
        </div>
        <div id="msgs_container" class="modal-body" style="padding:40px 50px;">
        			<?php
           	    	foreach($messages as $message)
	    			{ ?>
	    				<div class="msg_bubble borders">
		    				<p>
		    					<a href="/users/show_profile/<?= $message['id']?>">
			    					<img src="<?= $message['picture_url'] ?>">
				    				<?= $message['first_name']." ".$message['last_name'] ?>
			    				</a>
		    				</p>
		    				<p><?= $message['updated_at'] ?></p>
		    				<p><?= $message['content'] ?></p>
	    				</div>

            <form class="newMsg" action="/messages/replyPersonal/<?=$message['id']?>" method="post" role="form">
	    			<?php
	    			}?>
        </div>
        <div class="modal-footer">
	            <div class="form-group">
		            <textarea class="form-control" name="content" id="" placeholder="Enter reply..."></textarea>
	            </div>
	              <button type="submit" class="location_btn btn btn-success btn-block"><span class="glyphicon glyphicon-envelope"></span> Submit </button>
            </form>
        
        </div>
      </div>
      
    </div>
  </div> 
</div>