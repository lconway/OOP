<?php

	class Bike {
		var $price;
		var $maxSpeed;
		var $miles;

		function __construct($newPrice, $newSpeed) {
			$this->price = $newPrice;
			$this->maxSpeed = $newSpeed;
			$this->miles = 0;
		}

		function displayInfo() {
			echo "Price: " . $this->price;
			echo "Max Speed: " . $this->maxSpeed;
			echo "Total Miles: " . $this->miles;
		}

		function drive() {
			echo "Driving";
			$this->miles += 10;
		}

		function reverse () {
			echo "Reversing";
			if ($this->miles > 5) {
				$this->miles -= 5;
			}
		}
	}

	$bike1 = new Bike(200, "25mph");
	$bike2 = new Bike(400, "35mph");
	$bike3 = new Bike(500, "40mph");

	$bike1->drive();
	$bike1->drive();
	$bike1->drive();
	$bike1->reverse();
	$bike1->displayInfo();
	
	$bike2->drive();
	$bike2->drive();
	$bike2->reverse();
	$bike2->reverse();
	$bike2->displayInfo();
	
	$bike3->reverse();
	$bike3->reverse();
	$bike3->reverse();
	$bike3->displayInfo();
?>