<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Event');
    $this->load->model('Message');
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
   $image_url=$this->input->post('image_url');
   $created_at=date('Y-m-d H:i:s');
   $updated_at=date('Y-m-d H:i:s');
   $this->load->model('User');

   $user_session_id=($this->session->userdata('id')['id']);
   $row=$this->User->find_id($user_session_id);
   $creator_id=$row['id'];

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
    'updated_at'=> $updated_at,
    'creator_id'=> $creator_id,
    'image_url'=>$image_url
    );
  $this->load->library("form_validation");
  $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]');
  $this->form_validation->set_rules('description', 'Description', 'max_length[150]');
  $this->form_validation->set_rules('hike_location', 'Hike Location', 'trim|required');
  $this->form_validation->set_rules('distance', 'Distance', 'trim|required');
  $this->form_validation->set_rules('duration', 'Duration', 'trim|required');
  $this->form_validation->set_rules('departure_location', 'Meeting Location', 'trim|required');
  $this->form_validation->set_rules('departure_date', 'Departure Date', 'trim|required');
  $this->form_validation->set_rules('image_url', 'Image URL', 'trim|required|max_length[350]');
  if ($this->form_validation->run() === FALSE) {

      $this->session->set_flashdata('name_error', form_error('name'));
      $this->session->set_flashdata('description_error', form_error('description'));
      $this->session->set_flashdata('hike_location_error', form_error('hike_location'));
      $this->session->set_flashdata('distance_error', form_error('distance'));
      $this->session->set_flashdata('duration_error', form_error('duration'));
      $this->session->set_flashdata('departure_location_error', form_error('departure_location'));
      $this->session->set_flashdata('departure_date_error', form_error('departure_date'));
      $this->session->set_flashdata('image_url_error', form_error('image_url'));
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
  public function show_all1()
  {
    $table['origin']=$this->input->post('city');
    $this->load->view('events_new_origin', $table);


  }
  public function display_all_events(){

    $this->load->model('Event');
    $events= $this->Event->display_everything();

    $this->load->model('User');
    $row= $this->User->find_id($this->session->userdata('id'));
    $origin = $row['location'];
    $this->load->view('partials/events', array(
      'events'=> $events,
      'origin' => $origin
    ));

  }
  public function display_soonest(){

    $this->load->model('Event');
    $events= $this->Event->display_soonest();
    $this->load->model('User');
    $row= $this->User->find_id($this->session->userdata('id'));
    $origin = $row['location'];
    $this->load->view('partials/events', array(
      'events'=> $events,
      'origin' => $origin
    ));

  }
  public function display_soonest1(){

    $this->load->model('Event');
    $events= $this->Event->display_soonest();
    $origin=$this->input->post('city');
    $this->load->view('partials/events', array(
      'events'=> $events,
      'origin' => $origin
    ));
  }
 
  public function display_latest(){

    $this->load->model('Event');
    $events= $this->Event->display_latest();
    $this->load->model('User');
    $row= $this->User->find_id($this->session->userdata('id'));
    $origin = $row['location'];
    $this->load->view('partials/events', array(
      'events'=> $events,
      'origin' => $origin
    ));

  }
  public function display_spots_most(){

    $this->load->model('Event');
    $events= $this->Event->display_spots_most();
    $this->load->model('User');
    $row= $this->User->find_id($this->session->userdata('id'));
    $origin = $row['location'];
    $this->load->view('partials/events', array(
      'events'=> $events,
      'origin' => $origin
    ));

  }
   public function display_spots_least(){

    $this->load->model('Event');
    $events= $this->Event->display_spots_least();
    $this->load->model('User');
    $row= $this->User->find_id($this->session->userdata('id'));
    $origin = $row['location'];
    $this->load->view('partials/events', array(
      'events'=> $events,
      'origin' => $origin
    ));

  }
     public function display_soonest2($origin){

    $this->load->model('Event');
    $events= $this->Event->display_soonest();
    $this->load->view('partials/events', array(
      'events'=> $events,
      'origin' => $origin
    ));
  }
  public function display_latest2($origin){

    $this->load->model('Event');
    $events= $this->Event->display_latest();
    $this->load->view('partials/events', array(
      'events'=> $events,
      'origin' => $origin
    ));

  }
  public function display_spots_most2($origin){

    $this->load->model('Event');
    $events= $this->Event->display_spots_most();
    $this->load->view('partials/events', array(
      'events'=> $events,
      'origin' => $origin
    ));

  }
  public function display_spots_least2($origin){

    $this->load->model('Event');
    $events= $this->Event->display_spots_least();
    $this->load->view('partials/events', array(
      'events'=> $events,
      'origin' => $origin
    ));

  }

  // needs to take in parameter for event
  public function show($id, $origin)
  {
    $event = $this->Event->show_by_id($id);
    $current_user_id = (int) $this->session->userdata['id']['id'];
    // $view_data['messages'] = $this->Message->get_all_event_messages($this->session->userdata('id'));
    $this->load->view('single_event', array(
      'event'=> $event,
      'current_user_id'=>$current_user_id,
      'origin_point'=>$origin
      ));
  }

  public function google(){
    $array=$this->input->post();
    foreach ($array as $key => $value) {
      $value=$key;
    }

    $html = file_get_contents("https://maps.googleapis.com/maps/api/place/autocomplete/json?input=".urlencode($value)."&key=AIzaSyApbO-TW6-gkolVfdL1uKgqDCP2rC3fg2A");
    $this->output
       ->set_content_type('application/json')
       ->set_output($html);
  }
  public function distance($hike_location, $origin_point)
 {
  
  $html = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins='. urlencode($origin_point) . '&destinations=' . urlencode($hike_location) . '&mode=driving&language=en-US&key=AIzaSyApbO-TW6-gkolVfdL1uKgqDCP2rC3fg2A');
  $this->output
       ->set_content_type('application/json')
       ->set_output($html);
 }

}
?>