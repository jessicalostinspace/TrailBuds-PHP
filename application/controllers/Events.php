<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    //$this->load->model('Event');
  }

  public function index()
  {
    $this->load->view('login');
  }

  public function create()
  {
    $this->load->view('create_event');
  }

  // show all events
  public function show_all()
  {
    $this->load->view('events');
  }

  // needs to take in parameter for event
  public function show()
  {

    // $this->load->view('single_event');
  }

}
?>