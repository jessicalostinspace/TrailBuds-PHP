<?php
class Message extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {

  }

  public function create_personal($content, $sender_id, $receiver_id)
  {
  	$query = "INSERT INTO messages (content, receiver_id, sender_id, events_id, created_at, updated_at) VALUES (?,?,?, NULL, NOW(),NOW())";
  	  	// var_dump($query);die;
  	return $this->db->query($query, array($content, $receiver_id, $sender_id));
  }

  //this id is session id to display on personal messages page
  public function getAllPersonal($id)
  {
  	$query = "SELECT messages.content, sender.picture_url, sender.id, sender.first_name, sender.last_name, messages.updated_at
  			FROM messages 
  			LEFT JOIN users AS sender
  			ON messages.sender_id = sender.id
  			LEFT JOIN users AS receiver
  			ON messages.receiver_id = receiver.id
  			WHERE receiver_id = ?
  			ORDER BY messages.updated_at DESC;";
  			// var_dump($query);
  			// var_dump($this->db->query($query, array($id))->result_array());die;
  	return $this->db->query($query, array($id))->result_array();
  }
}
?>