<?php

include_once("connection.php");
session_start();

class Country{
	var $country;
	var $continent;
	var $region;
	var $population;
	var $life_expectancy;
	var $government_form;

	public function __set($name, $value) {
		echo "Setting '$name' to 'value'\n";
		$this->$name = $value;
	}

	public function __get($name) {
		echo "Getting '$name'\n";
		return $this->$name;
	}
}   // end class Country

class Process{

	var $connection;

	public function __construct(){
		$this->connection = new Database();
	}     // end constructor

	public function getInfo()
	{
		$query = "SELECT * FROM country WHERE lcase(Name) = '" . strtolower($_POST['country']) . "';";
		$country = $this->connection->fetch_record($query);	
		return $country;
	}    //end function getInfo()

}     // end class Process

$process = new Process();
$countryInfo = $process->getInfo($_POST['country']);

echo json_encode($countryInfo);

?>