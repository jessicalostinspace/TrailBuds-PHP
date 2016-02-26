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

    public function replyPersonal($receiver_id)
  {
    $content = $this->input->post('content');

    //This should be users auto incremented id
    $sender_id = $this->session->userdata('id')['id'];

    $this->Message->create_personal($content, $sender_id, $receiver_id);

    $messages['messages'] = $this->Message->getHistory($receiver_id, $sender_id);

    $this->load->view('/partials/modalmessages', array("messages" => $messages['messages'], "sender_id" => $sender_id));   

  }

  //called from messages/partials when user clicks on a user in their message box
  public function showHistory($sender_id)
  {
    $receiver_id = $this->session->userdata('id')['id'];

    $messages['messages'] = $this->Message->getHistory($receiver_id, $sender_id);

    $this->load->view('/partials/modalmessages', array("messages" => $messages['messages'], "sender_id" => $sender_id));   
  }

  //Shows all personal messages on home page
  public function showPersonal()
  {
  	$receiver_id = $this->session->userdata('id')['id'];

   	$messages['messages'] = $this->Message->getAllPersonal($receiver_id);
   	// var_dump($messages); die;

    $this->load->view('/partials/messages', $messages); 	
  }


}
?>