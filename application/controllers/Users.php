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
		$this->load->view('home');
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

    // // Logged in
    // echo '<h3>Access Token</h3>';
    // echo($accessToken->getValue());

    $this->session->set_userdata('fb_access_token', $accessToken);


    try {
      // Returns a `Facebook\FacebookResponse` object
      $response = $fb->get('/me?fields=id,name,first_name,last_name,email,birthday,gender,picture', $accessToken);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }
    // get user information from facebook, setting to $user
    $user = $response->getGraphUser();

    // rewrite these conditions, checking if the fields exist
    $email;
    if($user['email'])
    {
      $email = $user['email'];
    }
    else
    {
      $email = NULL;
    }

    $birthday;
    if(isset($user['birthday']))
    {
      $birthday = $user['birthday'];
    }
    else
    {
      $birthday = NULL;
    }

    // check if user exists in the database
    $found_user = $this->User->find($user['id']);
    $current_user = array(
                          'id' => $user['id'],
                          'name' => $user['name'],
                          'first_name' => $user['first_name'],
                          'email' => $email,
                          'birthday' => $birthday,
                          'gender' => $user['gender'],
                          'picture_url' => $user['picture'],
                          'logged_in' => TRUE
                          );

    // if found, set their data to session
    if($found_user)
    {
      $this->session->set_userdata('current_user', $current_user);
    }
    // if not found create user and set data to session
    else
    {
      $this->User->create($user);
      $this->session->set_userdata('current_user', $current_user);
    }
  }

  public function logout()
  {

  }

  // takes in @id, displays individual profile
  public function show_profile()
  {
    $view_data['users'] = $this->session->all_userdata();
    $this->load->view('profile_view', $view_data);
  }

}
?>