<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User');
    // $this->output->enable_profiler(TRUE);
  }

	public function index()
	{
		// $this->load->view('login_view');
	}

  public function login()
  {
    # /js-login.php
    $fb = new Facebook\Facebook([
      'app_id' => '598326020324395',
      'app_secret' => '5f63bcca2c2e6d0fa276170918101640',
      'default_graph_version' => 'v2.2',
      ]);

    $helper = $fb->getJavaScriptHelper();

    try { 
      $accessToken = $helper->getAccessToken();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }

    if (! isset($accessToken)) {
      echo 'No cookie set or no OAuth data could be obtained from cookie.';
      exit;
    }

    // Logged in
    echo '<h3>Access Token</h3>';
    echo($accessToken->getValue());

    $this->session->set_userdata('fb_access_token', $accessToken);


    try {
      // Returns a `Facebook\FacebookResponse` object
      $response = $fb->get('/me?fields=id,first_name,last_name,email,birthday,gender,picture', $accessToken);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }

    $user = $response->getGraphUser();
    $this->User->create($user);

  }    



//NEED TO REDIRECT



  public function logout()
  {

  }

  // takes in @id, displays individual profile
  public function show_profile()
  {
    $this->load->view('profile_view');
  }

}
?>