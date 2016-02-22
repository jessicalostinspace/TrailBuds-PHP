<?php
class Event extends CI_Model
{
  function show()
  {
    return $this->db->query("SELECT * FROM users")->result_array();
  }
}
?>