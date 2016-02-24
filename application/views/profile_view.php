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
			<h1 style="display:inline"><?= $user['name']?></h1>
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
    
    <p></p>
    <p>Weeeeeeee, I love pizza and doges and mountains and trees and hikes!!!!!!☼☼☼ ♉!!!!!!!</p>
  </div>
</div>
 <a class="#" href="/all"><h3>About :  </h3></a>


</div>


<?php require_once('footer.php'); ?>