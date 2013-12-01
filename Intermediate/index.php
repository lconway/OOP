<?php

	class Animal {
		var $name;
		var $health;

		function __construct() {
			$this->health = 100;
			$this->name = "animal";
		}

		function displayHealth() {
			echo "Name: " . $this->name;
			echo "  Health: " . $this->health;
		}

		function walk() {
			$this->health -= 1;
		}

		function run () {
			$this->health -= 5;
		}
	}

	class Dog extends Animal{

		function __construct() {
			$this->health = 150;
			$this->name = "dog";
	}

		function pet () {
			$this->health += 5;
		}
	}

	class Dragon extends Animal{

		function __construct($name) {
			parent::__construct();
			$this->health = 170;
			$this->name = "dragon";
		}

		function fly () {
			$this->health -= 10;
		}

		function displayHealth() {
			echo "This is a dragon!<br>";
			parent::displayHealth();
		}
	}

	$animal = new Animal();

	$animal->walk();
	$animal->walk();
	$animal->walk();
	$animal->run();
	$animal->run();
	$animal->displayHealth();
	//$animal->fly();
	echo "<br><br>";

	$dog = new Dog();
	$dog->walk();
	$dog->walk();
	$dog->walk();
	$dog->run();
	$dog->run();
	$dog->pet();
	$dog->displayHealth();
	echo "<br><br>";

	$dragon = new Dragon("");
	$dragon->walk();
	$dragon->walk();
	$dragon->walk();
	$dragon->run();
	$dragon->run();
	$dragon->fly();
	$dragon->fly();
	$dragon->displayHealth();
	echo "<br><br>";


?>