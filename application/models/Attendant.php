<?php
class Attendant extends CI_Model
{

  public function show_all($event_id)
  {
    return $this->db->query("SELECT * FROM users JOIN attendees ON users.id = attendees.user_id WHERE attendees.event_id = ? ORDER BY attendees.attendance_id DESC", array($event_id))->result_array();
  }

  // need to fix to not allow duplicate attendees
  public function create($post_data)
  {
    // $query = "INSERT INTO attendees (user_id, event_id, created_at, updated_at) VALUES (?,?,NOW(),NOW())
    //           WHERE NOT EXISTS (SELECT * FROM attendees WHERE user_id = ? AND event_id = ?)";
    $query = "INSERT INTO attendees (user_id, event_id, created_at, updated_at) VALUES (?,?,NOW(),NOW())
              ON DUPLICATE KEY UPDATE user_id = ?";
    $values = array($post_data['user_id'], $post_data['event_id'], $post_data['user_id']);
    return $this->db->query($query, $values);
  }
}