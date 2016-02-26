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

  public function createPersonal($id)
  {
  	$content = $this->input->post('content');

  	//This should be users auto incremented id
  	$sender_id = $this->session->userdata('id');

  	$this->Message->create_personal($content, $sender_id, $id);
  	redirect('/users/show_profile/'.$id);
  }

    public function replyPersonal($id)
  {
    $content = $this->input->post('content');

    //This should be users auto incremented id
    $sender_id = $this->session->userdata('id');

    $this->Message->create_personal($content, $sender_id, $id);

    redirect('/messages/showPersonal');

  }

  //Shows all personal messages on home page
  public function showPersonal()
  {
  	$id = $this->session->userdata('id');
   	$messages['messages'] = $this->Message->getAllPersonal($id);
   	// var_dump($messages); die;

    $this->load->view('/partials/messages', $messages);
  }

  public function index_html($event_id)
   {
     $view_data["messages"] = $this->Message->get_all_event_messages($event_id);

     $this->load->view("partials/event_messages", $view_data);
   }

  public function create_event_message()
  {
    $created = $this->Message->create_event_message($this->input->post());

    $view_data["messages"] = $this->Message->get_all_event_messages($this->input->post('event_id'));
    $this->load->view("partials/event_messages", $view_data);
  }
}
?>