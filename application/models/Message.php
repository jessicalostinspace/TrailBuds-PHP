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
  //called when user clicks on #of messages they have on their user profile
  public function getAllPersonal($receiver_id)
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
  			// var_dump($this->db->query($query, array($receiver_id))->result_array());die;
  	return $this->db->query($query, array($receiver_id))->result_array();
  }


  public function getHistory($receiver_id, $sender_id)
  {
    $query = "SELECT messages.content, sender.picture_url, sender.id, sender.first_name, sender.last_name, messages.updated_at
        FROM messages 
        LEFT JOIN users AS sender
        ON messages.sender_id = sender.id
        LEFT JOIN users AS receiver
        ON messages.receiver_id = receiver.id
        WHERE (receiver_id = ? AND sender_id = ?) OR (receiver_id = ? AND sender_id = ? )
        ORDER BY messages.updated_at DESC;";
        // var_dump($query);
        // var_dump($this->db->query($query, array($id))->result_array());die;
    return $this->db->query($query, array($receiver_id, $sender_id, $sender_id, $receiver_id))->result_array();
  }

  // get messages by event
  public function get_all_event_messages($event_id)
  {
    $query = "SELECT * FROM events
              JOIN messages ON messages.events_id = events.id
              JOIN users ON messages.sender_id = users.id ORDER BY messages.id DESC";
    return $this->db->query($query)->result_array();
  }

  // create a message on an event page
  public function create_event_message($post_data)
  {
    $query = "INSERT INTO messages (content, receiver_id, sender_id, events_id, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
    $values = array($post_data['message'], $post_data['receiver_id'], $post_data['sender_id'], $post_data['event_id']);
    return $this->db->query($query, $values);
  }
}
?>