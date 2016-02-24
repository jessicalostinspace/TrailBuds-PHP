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

  public function create_personal($content, $receiver_id, $sender_id)
  {
  	$query = "INSERT INTO messages (content, receiver_id, sender_id, created_at, updated_at) VALUES (?,?,?, NOW(),NOW())";
  	return $this->db->query($query, array($content, $receiver_id, $sender_id));
  }
}
?>