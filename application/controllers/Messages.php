<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('Message');
    //$this->load->model('Event');
  }

  public function index()
  {
    $this->load->view('');
  }

  public function createPersonal()
  {
  	$content = $this->input->post('content');
  	$sender_id = $this->session->userdata('facebook_id');
  	$receiver_id = $this->input->post('receiver_id');

  	$this->Message->create_personal($content, $sender_id, $user_id);
  }
}
?>