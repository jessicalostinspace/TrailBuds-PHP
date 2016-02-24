<?php require_once('header.php'); ?>


<style type="text/css">
	.profile_images{
		height:350px;
	}
  		/*The z-index property specifies the stack order of an element.
		An element with greater stack order is always in front of an element with a lower stack order.*/
	.profile_background{
		z-index: -1;
	}
	.profile_header{
		opacity: 0.4;
  		background-color: #030503;
  		width: 1000px;
  		height: 75px;
		z-index: 1;
		position: relative;
		top: -75px;
		right: 70px;
	}
	.profile_picture{
		z-index: 2;
		position: relative;
		border-radius: 10px;
		bottom: 130px;
		left: 48px;
	}
	h1{
		position: relative;
		bottom: 93px;
		left: 69px;
	}
	h6,h2{
		color: white;
		z-index: 3;
		position: relative;
		left: -245px;
		top: 15px;
		margin: 0;
		text-align: center;
	}
	#upcoming_events{
		position: relative;
		left: 215px;
		bottom: -30px;
		width: 495px;
	}
	.panel{
		border-color: #043505;
	}
	.panel-heading{
		border-bottom-style: solid;
		border-color: #043505;
	}
	.message{
		background-color: #043505;
	    height: 39px;
	    width: 120px;
	    position: relative;
	    bottom: 216px;
	    left: 48px;
	}
	#description{
		width: 196px;
	    position: relative;
	    left: 2px;
	    bottom: 201px;
	}
	.edit{
		font-size: 14px;
	}
    .modal-header, .modal_header, .close {
      background-color: #043505;
      color:white !important;
      text-align: center;
      font-size: 30px;
  	}
    .modal-footer {
      background-color: #f9f9f9;
    }
    .location_btn{
    	background-color: #043505;
    }
    p.location{
    	font-style: oblique;
    }
    #local_events{
	    width: 263px;
	    position: relative;
	    left: -150px;
	    bottom: 519px;
	    float: right;
    }
</style>


<div class="container">

	<div class="profile">
		<div class="profile_images">
			<img class="profile_background .img-responsive" src="/assets/images/treesprofile.jpeg" alt="Trees Default" style="width:1000px;height:300px;">
			<div class="container profile_header">				

					<h6>Completed Hikes</h6>
					<h2>5</h2>

			</div>
			<img class="profile_picture .img-rounded" src="<?= $user['picture_url']?>" alt="Profile picture" style="width:120px; height:120px;">
			<h1 style="display:inline"><?= $user['first_name']." ".$user['last_name']?></h1>
		</div>	 
	</div>

	<div id="upcoming_events" class="panel panel-success">
		<div class="panel-heading">
			Upcoming Events
		</div>
		<div class="panel-body">

			<h4><a href="#">No, motherfucker</a></h4>
			<p>Look, just because I don't be givin' no man a foot massage don't make it right for Marsellus to throw Antwone into a glass motherfuckin' house, fuckin' up the way the nigger talks. Motherfucker do that shit to me, he better paralyze my ass, 'cause I'll kill the motherfucker, know what I'm sayin'? </p>


		</div>
	</div>

 
 <a class="message btn btn-success btn-xs" href="/all"><h5>Message</h5></a>

	 <div id="description" class="panel panel-default">
	  <div class="panel-body">
	    <h3>About<a class="edit" style="margin-left: 50px;" href="#">Edit</a></h3>
	    <p class="location"><?= $user['location'] ?></p>
	    <p></p>
	    <p><?= $user['description'] ?></p>
	  </div>
	</div>

	<div id="local_events" class="panel panel-success">
		<div class="panel-heading">
			Events near you
		</div>
		<div class="panel-body">

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
	</div>
</div>

<div class="container">
  <h2>Description Modal</h2>

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
});
</script>



<?php require_once('footer.php'); ?>