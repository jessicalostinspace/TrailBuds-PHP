<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendees extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Attendant');
    $this->load->model('Event');
  }

  public function show_all($event_id)
  {
    $attendees = $this->Attendant->show_all($event_id);
    echo json_encode($attendees);
  }

  public function create()
  {
    $created = $this->Attendant->create($this->input->post());
    if ($created)
    {
      redirect("show/" . $this->input->post('event_id'));
    }
  }

  // public function create()
  // {
  //   $attendee = $this->Attendant->create($this->input->post());

  //   if ($attendee)
  //   {
  //     redirect('/asdfasdf')
  //     // $view_data['event'] = $this->Event->show_all
  //     // $this->load->view("show/" . $attendee['event_id'], $view_data);
  //     // $this->show_all($attendee['event_id']);
  //     // $attendees = $this->Attendant->show_all($attendee['event_id']);
  //     // echo json_encode($attendees);
  //   }
  // }
}