<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('login_view');
	}

  public function login()
  {

  }

  public function register()
  {

  }

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