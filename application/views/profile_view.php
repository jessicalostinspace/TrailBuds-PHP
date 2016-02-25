<?php require_once('header.php'); 

	if(!$this->session->userdata( 'fb_access_token' )){
		redirect("/");
	}

?>


<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal_header"><span class="glyphicon glyphicon-user"></span> About me</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form action="/users/description" method="post" role="form">
	            <div class="form-group">
	              <label for="psw"><span class="glyphicon glyphicon glyphicon-home"></span> Location</label>
	              <input name="location" type="text" class="form-control" id="psw" placeholder="Enter City, State">
	            </div>
	            <div class="form-group">
	              <label for="usrname"><span class="glyphicon glyphicon-tree-conifer"></span> Description</label>
	              <textarea class="form-control" name="description" id="usrname" placeholder="What are your favorite hikes/hiking conditions? Most memorable hikes?"></textarea>
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
<script>
$(document).ready(function(){
    $(".edit").click(function(){
        $("#myModal").modal();
    });

    $(".message").click(function(){
	    $("#myMsgModal").modal();
    });

	$('.newMsg').click(function(){
		$.get($(this).attr('href'), function(res){
				$('#replaced').html(res);	
			}, 'html');

    $("body").on("click", ".view_chat",function(){
    	// alert("test");

	    $("#privateMsgModal").modal();
    });	

    // $.get('https://api.layer.com', function(res){

    // }, 'json');    

    // $.ajax({
    //      url: "https://api.layer.com",
    //      type: "GET",
    //      Accept: application/vnd.layer+json; version=1.1,
    //      Authorization: Bearer TOKEN,
    //   });
	return false;
	});

});
</script>

	<div class="container">
		<div class="images row">
	    	<div class="col-sm-12">
	    		<img class="profile_background .img-responsive" src="/assets/images/treesprofile.jpeg" alt="Trees Default">
				<div class="container profile_header">				

					<h6 class='headerinfo'>Completed Hikes</h6>
					<h2 class='headerinfo'>5</h2>

					<div style="display: inline;">
						<h6 class='headerinfo2'>New Messages</h6>
						<h2 class='headerinfo2'><a class="newMsg" href="/messages/showPersonal">7</a></h2>
					</div>
				</div>
				<img class="profile_picture .img-rounded" src="http://graph.facebook.com/<?= $user['facebook_id']?>/picture?type=large" alt="Profile picture" style="width:120px; height:120px;">
				<!-- http://graph.facebook.com/{ID}/picture?type=large -->

				<h1 class="username_display"><?= $user['first_name']." ".$user['last_name']?></h1>
	    	</div>
		</div>
		<div class="row">
		 	<div class="aboutme borders col-sm-2">
		 		<h3 class="forest">
			 		About<a class="edit" href="#">Edit</a>
		 		</h3>
			    <p class="location"><?= $user['location'] ?></p>
			    <p></p>
			    <p><?= $user['description'] ?></p>
		 	</div>
<div id="replaced">		    
		    <div class="col-sm-1">
		    	<a class="message btn btn-success btn-xs" href="#"><h5>Message</h5></a>
		    </div>
			<div class="future_events borders col-sm-5">
				<h2 class="forest">Upcoming Hikes</h2>

				<h4><a href="#">No, motherfucker</a></h4>
				<p>Look, just because I don't be givin' no man a foot massage don't make it right for Marsellus to throw Antwone into a glass motherfuckin' house, fuckin' up the way the nigger talks. Motherfucker do that shit to me, he better paralyze my ass, 'cause I'll kill the motherfucker, know what I'm sayin'? </p>

				<h4><a href="#">No, motherfucker</a></h4>
				<p>Look, just because I don't be givin' no man a foot massage don't make it right for Marsellus to throw Antwone into a glass motherfuckin' house, fuckin' up the way the nigger talks. Motherfucker do that shit to me, he better paralyze my ass, 'cause I'll kill the motherfucker, know what I'm sayin'? </p>

				<h4><a href="#">No, motherfucker</a></h4>
				<p>Look, just because I don't be givin' no man a foot massage don't make it right for Marsellus to throw Antwone into a glass motherfuckin' house, fuckin' up the way the nigger talks. Motherfucker do that shit to me, he better paralyze my ass, 'cause I'll kill the motherfucker, know what I'm sayin'? </p>
		    </div>
		    <div class="col-sm-1">
		    	
		    </div>
		    <div class="events_near_you borders col-sm-3">
		    	<h2 class="forest">Hikes near you</h2>

				<h5><a href="#">Mt.Rainier this Tuesday!!!</a></h5>
				<p><i>Tues, May 25</i></p>
				<p>Location: Paradise-Rainier (295 mi. from you)</p>
				<p><b>Length:</b> 8 mi. <b>Elev. Gain:</b> 2500 ft.</p>
				<p></p>
				<h5><a href="#">Mt.Rainier next Tuesday!!!</a></h5>
				<p><i>Tues, May 31</i></p>
				<p>Location: Paradise-Rainier (295 mi. from you)</p>
				<p><b>Length:</b> 8 mi. <b>Elev. Gain:</b> 2500 ft.</p>

		    </div>
	 	<div class="row">
		 	<div class="col-sm-4"></div>
	 		<div class="past_events borders col-sm-5">
				<h2 class="forest">Past Hikes</h2>

				<h4><a href="#">Yes, motherfucker</a></h4>
				<p>Look, just because I don't be givin' no man a foot massage don't make it right for Marsellus to throw Antwone into a glass motherfuckin' house, fuckin' up the way the nigger talks. Motherfucker do that shit to me, he better paralyze my ass, 'cause I'll kill the motherfucker, know what I'm sayin'? </p>

		    </div>
		</div>
	 	<div class="row">
	 		<div class="borders col-sm-12">
		 		<label class="control-label"><h2>Snap a cool pic on the trail? Upload it!</h2></label>
				<input id="input-1" type="file" class="file">
				<p></p>
	 		</div>
	 	</div>
</div>			    
	</div>

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myMsgModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal_header"><span class="glyphicon glyphicon-user"></span> Message <?= $user['first_name'] ?></h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
            <form id="messagebtn" action="/messages/createPersonal/<?= $user['id'] ?>" method="post" role="form">
		            <div class="form-group">
			            <label for="usrname"><span class="glyphicon glyphicon-tree-conifer"></span> Message</label>
			            <textarea class="form-control" name="content" id="usrname" placeholder="Enter message..."></textarea>
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




<?php require_once('footer.php'); ?>