<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('Message');
    $this->load->model('User');
    //$this->load->model('Event');
  }

  public function index()
  {

  }

  public function createPersonal()
  {
  	$content = $this->input->post('content');

  	//This should be users auto incremented id
  	$sender_id = $this->session->userdata('id');

  	$receiver_id = $this->session->userdata('id');
  	//NEED TO FIGURE OUT HOW TO GRAB THIS
  	// $receiver_id = $this->input->post('receiver_id');

  	  	//This should be users auto incremented id USING AS TEST 
  	// $receiver_id = $this->session->userdata('id');
  	$this->Message->create_personal($content, $sender_id, $receiver_id);
  	redirect('/users/show_profile');
  }

  public function showPersonal()
  {
  	$id = $this->session->userdata('id');
   	$messages['messages'] = $this->Message->getAllPersonal($id);
   	// var_dump($messages); die;
    $this->load->view('/partials/messages', $messages); 	
  }
}
?>