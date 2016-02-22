<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

  public function index()
  {
    $this->load->model('Event');
    $array = $this->Event->show();
    var_dump($array);
    die();
    $this->load->view('home');
  }

  public function add()
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

    $this->load->view('single_event');
  }

}
?>