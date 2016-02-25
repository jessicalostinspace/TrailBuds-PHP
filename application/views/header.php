<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TrailBuds</title>

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 

    <!-- home styling -->
    <style>

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
    /*z-index:3;*/
  }

  #login_button {
    background: url("<?= base_url('/assets/images/login_button.png') ?>");
    background-size: cover;
    width: 137px;
    margin-top: 7px;
  }

</style>  
 <!-- home styling -->

</head>
<body>

<script>
 $(document).ready(function(){


  logInWithFacebook = function() {
    FB.login(function(response) {
      if (response.authResponse) {
        // Now you can redirect the user or do an AJAX request to
        // a PHP script that grabs the signed request from the cookie.
        $.get("/login", function(res){
          window.location.replace('/users/show_profile/' + res);
        });

        console.log("hello");
      } else {
        alert('User cancelled login or did not fully authorize.');
      }
      return false;
    });
  };
 // logOutWithFacebook = function() {
 //        console.log(FB.getAuthResponse());
 //    var token = "<?= $this->session->userdata('fb_access_token');?>";
  //   FB.logout(function(response) {
  //         // Logout from the site and facebook
  //     $(location).attr('href', 'http://localhost:8888');    
  //    });
  // });

window.onload=function()
{
    // initialize the library with your Facebook API key
    // FB.init({ apiKey: '598326020324395' });

    //Fetch the status so that we can log out.
    //You must have the login status before you can logout,
    //and if you authenticated via oAuth (server side), this is necessary.
    //If you logged in via the JavaScript SDK, you can simply call FB.logout()
    //once the login status is fetched, call handleSessionResponse
    FB.getLoginStatus(logOutWithFacebook);
}


$('#fb_logout').click(function() {
    logOutWithFacebook();
  });
//handle a session response from any of the auth related calls
function logOutWithFacebook() {
    //if we dont have a session (which means the user has been logged out, redirect the user)

    FB.getLoginStatus(function(response) {
      console.log(response);
      if (response && response.status === "connected") {
        
        FB.logout(function(response) {
           $.get('logout');
          if (response.status != "connected") {

             window.location = "/";
            return;
          }
        });
      }
    });
    

    //if we do have a non-null response.session, call FB.logout(),
    //the JS method will log the user out of Facebook and remove any authorization cookies
    // FB.logout(logOutWithFacebook);
}

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

    // Fix sticky navbar to top of page 
    var navbar = $('#navbar-main'),
        distance = navbar.offset().top,
        $window = $(window);

    $window.scroll(function() {
        if ($window.scrollTop() >= distance) {
            navbar.removeClass('navbar-fixed-top').addClass('navbar-fixed-top');
            $("body").css("padding-top", "70px");
        } else {
            navbar.removeClass('navbar-fixed-top');
            $("body").css("padding-top", "0px");
        }
    });
      
 });


</script>

  <nav id="navbar-main" class="navbar navbar-inverse navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/users">TrailBuds</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right nav-pills ">
        <?php 
          if($this->session->userdata( 'fb_access_token' )){
?>
          <li><a href="/profile">Profile</a></li>
          <?php } ?>
          <li><a href="/all">Events</a></li>
                 <?php 
          if($this->session->userdata( 'fb_access_token' )){
?>
          <li><a id="fb_logout" class="btn" href="#">Logout</a></li>
          <?php } ?>
          <li><a id="login_button" class="btn" href="#" onClick="logInWithFacebook()"></a></li>
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


