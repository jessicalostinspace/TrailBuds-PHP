<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    //$this->load->model('Event');
  }

  public function index()
  {
    $this->load->view('');
  }
}
?>