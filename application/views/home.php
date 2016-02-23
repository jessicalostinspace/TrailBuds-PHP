<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TrailBuds</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- <link rel="stylesheet" href="../assets/style.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<style>
  body{
    background: url('http://i.imgur.com/HrVOqDY.jpg') no-repeat center fixed; 
    background-size:100% auto;
      /*background-size: cover;*/
  }
  #city_search {
    border: 2px solid #dadada;
    border-radius: 7px;
  }

  #city_search:focus { 
    outline: none;
    border-color: #0f3d00;
    box-shadow: 0 0 10px #60b263;
  }
  #city_border div{
  	opacity: 0.7;
  	background-color: #030503;
  	position: relative;
  	left: 200px;
  	top: 200px;
  	width: 700px;
  	height: 150px;
  	border-radius: 10px;
  }
</style>

</head>

<body>
<p><a href="#" onClick="logInWithFacebook()">Log In with the JavaScript SDK</a></p>

<script>
 $(document).ready(function(){

  logInWithFacebook = function() {
    FB.login(function(response) {
      if (response.authResponse) {
        // Now you can redirect the user or do an AJAX request to
        // a PHP script that grabs the signed request from the cookie.
        $.get("/login", function(res){
          $('.log').html(res);
        });
      } else {
        alert('User cancelled login or did not fully authorize.');
      }
    });
    return false;
  };
  window.fbAsyncInit = function() {
    FB.init({
      appId: '598326020324395',
      cookie: true, // This is important, it's not enabled by default
      version: 'v2.2'
    });
  };

  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
 });
</script>

  <nav class="navbar navbar-inverse navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Trail Buds</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right nav-pills ">
          <li><a class="btn btn-default navbar-btn" href="/profile">Profile</a></li>
          <li><a href="/all">Events</a></li>
          <li><a href="/signin">Signin</a></li>
          <li><a href="/logout">Logout</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

<div class="log"> </div>


<div class="container">
	<div id="city_border" class="container">
		<div class="form-group col-xs-7">
		  <h1><label style="color:white;" for="city">Find a trail buddy</label></h1>
		  <input id="city_search" type="search" class="form-control input-lg" id="city" placeholder="Enter your city">
		</div>
	</div>
</div>

<?php
require_once('footer.php');
?>