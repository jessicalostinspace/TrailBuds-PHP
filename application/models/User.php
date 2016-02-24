<?php
class User extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function find($fb_id)
	{
		return $this->db->query("SELECT * FROM users WHERE facebook_id = ?", array($fb_id))->row_array();
	}

	public function create($user)
	{
		$query = "INSERT INTO users (facebook_id, first_name, last_name, email, gender, picture_url, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
		$values = array($user['id'], $user['first_name'],$user['last_name'],$user['email'],$user['gender'],$user['picture']['url']);
		return $this->db->query($query, $values);
	}

	public function addProfileInfo($location, $description, $id)
	{
		$query = "UPDATE users SET location = ?, description = ?
					WHERE facebook_id = ?";

		return $this->db->query($query, array($location, $description, $id));
	}

	

	// public function destroy($id)
	// {
	// 	$query = "DELETE FROM users WHERE id = ?";
	// 	return $this->db->query($query, array($id));
	// }
}
?>