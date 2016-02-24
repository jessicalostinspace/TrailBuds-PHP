<?php
class Event extends CI_Model
{

	public function __construct()
   {
    parent::__construct();

   }

   public function create_event($table)
   {
    $query="INSERT INTO events(name, description, hike_location, distance, duration, elevation, departure_location, drive, attendees, departure_date, created_at, updated_at) values(?,?,?,?,?,?,?,?,?,?,?,?)";
    $values=array($table['name'], $table['description'], $table['hike_location'], $table['distance'], $table['elevation'], $table['duration'], $table['departure_location'], $table['drive'], $table['attendees'], $table['departure_date'], $table['created_at'], $table['updated_at']);
    return $this->db->query($query,$values);
   }

   public function update()
   {

   }

   public function display_all(){
    return $this->db->query('SELECT id, name, description, hike_location, distance, duration, elevation, departure_location, attendees, departure_date from events')->result_array();
   }

   public function show_by_id($id)
   {
    return $this->db->query("SELECT * FROM events WHERE id = ?", array($id))->row_array();
   }

}
?>