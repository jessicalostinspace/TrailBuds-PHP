<?php
class Event extends CI_Model
{

	public function __construct()
   {
    parent::__construct();

   }

   public function create_event($table)
   {

    $query="INSERT INTO events(name, description, hike_location, distance, duration, elevation, departure_location, drive, attendees, departure_date, created_at, updated_at, creator_id, image_url) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $values=array($table['name'], $table['description'], $table['hike_location'], $table['distance'], $table['elevation'], $table['duration'], $table['departure_location'], $table['drive'], $table['attendees'], $table['departure_date'], $table['created_at'], $table['updated_at'], $table['creator_id'], $table['image_url']);
    return $this->db->query($query,$values);
   }

   public function update()
   {

   }
   public function display_everything()
   {
    return $this->db->query("SELECT *, (events.attendees - count(attendees.id)) as 'attendees_remaining' from events left join attendees on attendees.event_id=events.id group by events.id order by departure_date")->result_array();
   }
   public function display_soonest()
   {
    return $this->db->query("SELECT *, (events.attendees - count(attendees.id)) as 'attendees_remaining' from events left join attendees on attendees.event_id=events.id group by events.id order by departure_date")->result_array();
   }
   public function display_latest()
   {
    return $this->db->query("SELECT *, (events.attendees - count(attendees.id)) as 'attendees_remaining' from events left join attendees on attendees.event_id=events.id group by events.id order by departure_date desc")->result_array();
   }
   public function display_spots_least()
   {
    return $this->db->query("SELECT *, (events.attendees - count(attendees.id)) as 'attendees_remaining' from events left join attendees on attendees.event_id=events.id group by events.id order by attendees_remaining")->result_array();
  }
    public function display_spots_most()
    {
    return $this->db->query("SELECT *, (events.attendees - count(attendees.id)) as 'attendees_remaining' from events left join attendees on attendees.event_id=events.id group by events.id order by attendees_remaining desc")->result_array();
  }

   public function display_all()
   {
    return $this->db->query('SELECT id, name, description, hike_location, distance, duration, elevation, departure_location, attendees, departure_date from events')->result_array();
   }

   public function show_by_id($id)
   {
    return $this->db->query("SELECT * FROM events WHERE id = ?", array($id))->row_array();
   }

}
?>