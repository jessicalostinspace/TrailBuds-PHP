<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Event');
  }

  public function index()
  {
    $this->load->view('login');
  }

  public function create()
  {
   $name=$this->input->post('name');
   $description=$this->input->post('description');
   $hike_location=$this->input->post('hike_location');
   $distance=$this->input->post('distance');
   $duration=$this->input->post('duration');
   $elevation=$this->input->post('elevation');
   $departure_location=$this->input->post('departure_location');
   $drive=$this->input->post('drive');
   $attendees=$this->input->post('attendees');
   $departure_date=$this->input->post('departure_date');
   $created_at=date('Y-m-d H:i:s');
   $updated_at=date('Y-m-d H:i:s');
   $table=array(
    'name'=> $name,
    'description'=> $description,
    'hike_location'=> $hike_location,
    'distance'=> $distance,
    'duration'=> $duration,
    'elevation'=> $elevation,
    'departure_location'=> $departure_location,
    'drive'=> $drive,
    'attendees'=> $attendees,
    'departure_date'=> $departure_date,
    'created_at'=> $created_at,
    'updated_at'=> $updated_at
    );
  $this->load->library("form_validation");
  $this->form_validation->set_rules('name', 'Name', 'trim|required');
  $this->form_validation->set_rules('hike_location', 'Hike Location', 'trim|required');
  $this->form_validation->set_rules('distance', 'Distance', 'trim|required');
  $this->form_validation->set_rules('duration', 'Duration', 'trim|required');
  $this->form_validation->set_rules('departure_location', 'Meeting Location', 'trim|required');
  $this->form_validation->set_rules('departure_date', 'Departure Date', 'trim|required');
  if ($this->form_validation->run() === FALSE) {

      $this->session->set_flashdata('name_error', form_error('name'));
      $this->session->set_flashdata('hike_location_error', form_error('hike_location'));
      $this->session->set_flashdata('distance_error', form_error('distance'));
      $this->session->set_flashdata('duration_error', form_error('duration'));
      $this->session->set_flashdata('departure_location_error', form_error('departure_location'));
      $this->session->set_flashdata('departure_date_error', form_error('departure_date'));
      redirect('/events/show_all');
    }
  else {

        $this->Event->create_event($table);
        redirect('/events/show_all');
  }

  }

  // show all events
  public function show_all()
  {

    $this->load->view('events');


  }
  public function display_all_events(){

    $this->load->model('Event');
    $table['events']= $this->Event->display_all();
    $this->load->view('partials/events', $table);

  }

  // needs to take in parameter for event
  public function show($id)
  {
    $view_data['event'] = $this->Event->show_by_id($id);
    // $view_data['event']['departure_location'] = (str_replace(' ', '+', $view_data['event']['departure_location']));
    $this->load->view('single_event', $view_data);
  }

}
?>