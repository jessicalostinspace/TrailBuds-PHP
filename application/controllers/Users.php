<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User');
    $this->load->model('Message');
    $this->load->library('upload');
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
<<<<<<< HEAD
    $this->session->set_userdata('user_id', $found_user['id']);
=======

    //Set user auto-incremented ID from database
    $user_id = $this->User->getUserID($user['id']);

>>>>>>> be8dd8507fef1ef96472cac0c6801500609ad4d3
    $current_user = array(
                          'id' => $user_id,
                          'facebook_id' => $user['id'],
                          'name' => $user['name'],
                          'first_name' => $user['first_name'],
                          'email' => $email,
                          'birthday' => $birthday,
                          'gender' => $user['gender'],
                          'picture_url' => $user['picture']['url'],
                          'logged_in' => TRUE
                          );

    // if found, set their data to session
    if($found_user)
    {
      $this->session->set_userdata($current_user);
      echo $user_id['id'];
    }
    // if not found create user and set data to session
    else
    {
      $this->User->create($user);
      $this->session->set_userdata($current_user);
      echo $user_id['id'];
    }

  }

  public function logout()
  {

     // Logs off session from website
             // $this->load->library('facebook');
            // $data['login_url']=null;
             // $this->facebook->destroySession();
            // $_SESSION['do_not_auto_login']=true;
            // Make sure you destory website session as well.
    $this->session->sess_destroy();
    redirect('/');
  }

  // takes in @id, displays individual profile
  public function show_profile($id)
  {
    $view_data['user'] = $this->User->getAllInfo($id);
    $this->load->view('profile_view', $view_data);
  }
    //Sends user location and profile description to database
   //from post on profile_view page
    public function description()
  {
    $location = $this->input->post('location');
    $description = $this->input->post('description');
    $id = $this->session->userdata('id');

    $this->User->addProfileInfo($location, $description, $id);

    redirect('/users/show_profile');
  }

}
