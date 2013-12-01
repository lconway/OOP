<?php
	session_start();
	include_once("connection.php");

class User
{
	var $connection;
	var $id;
	var $first_name;
	var $last_name;
	var $email;
	var $password;
	var $created_at;
	var $updated_at;

	public function __construct($id,
								$first_name,
								$last_name,
								$email,
								$password,
								$created_at,
								$updated_at)

	{
		$this->connection = new Database();
		$this->id = $id;
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->email = $email;
		$this->password = $password;
		$this->created_at = $created_at;
		$this->updated_at = $updated_at;
	}
	
	public function __set($first_name, $value) {
		echo "Setting '$name' to 'value'\n";
		$this->first_name = $value;
	}

	public function __get($first_name) {
		echo "Getting '$name'\n";
		return $this->first_name;
	}
}

class Friend extends User 
{
	var $user_id;

	public function __construct($user_id)
	{
		$this->user_id = $user_id;
	}
}
?>