<?php
class User extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	// public function create($first_name, $last_name, $email, $password)
	// {
	// 	//credential_id =2 is regular user
	// 	$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at, credential_id) VALUES (?, ?, ?, ?, NOW(), NOW(), 2)";
	// 	$encrypted_password = password_hash($password, PASSWORD_DEFAULT);
	// 	return $this->db->query($query, array($first_name, $last_name, $email, $encrypted_password));
	// }

	// public function destroy($id)
	// {
	// 	$query = "DELETE FROM users WHERE id = ?";
	// 	return $this->db->query($query, array($id));
	// }
}
?>