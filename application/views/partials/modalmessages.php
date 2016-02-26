<style type="text/css">
.modal .modal-body {
    max-height: 350px;
    overflow-y: auto;
}
</style>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal_header"><span class="glyphicon glyphicon-comment"></span> Chat history with  <?= $messages[0]['first_name'] ?>
          </h4>
        </div>
        <div id="msgs_container" class="modal-body" style="padding:40px 50px;">
            <form id="newMsg" action="/messages/replyPersonal/<?=$sender_id?>" method="post" role="form">
	            <div class="form-group">
		            <textarea class="form-control" name="content" id="" placeholder="Enter reply..."></textarea>
	              <button type="submit" class="location_btn btn btn-success btn-block"><span class="glyphicon glyphicon-envelope"></span> Submit </button>
	            </div>
            </form>
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
		    				<p><?= date("g:i A l, F j, Y" ,strtotime($message['updated_at'])) ?></p>
		    				<p><?= $message['content'] ?></p>
	    				</div>
	    			<?php
	    			}?>
        </div>

        <div class="modal-footer">
        </div>
        </div>
        </div>
<script type="text/javascript">
    $('#newMsg').submit(function(){
    	$.post($(this).attr('action'), $(this).serialize(), function(res){
    		console.log("test");
    		$('#privateMsgModal').modal('toggle');
    	});
    	return false;
     });
</script>