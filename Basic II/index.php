<?php

	class Car {
		var $price;
		var $speed;
		var $fuel;
		var $mileage;
		var $tax;

		function __construct($price, $speed, $fuel, $mileage, $tax ) {
			$this->price = $price;
			$this->speed = $speed;
			$this->fuel = $fuel;
			$this->mileage = $mileage;
			$this->tax = $tax;

			if ($price > 10000) {
				$this->tax = 0.15;
			} else {
				$this->tax = 0.12;
			}

			$this->displayInfo();
		}

		function displayInfo() {
			echo "</br>Price: " . $this->price;
			echo "</br>Speed: " . $this->speed;
			echo "</br>Fuel: " . $this->fuel;
			echo "</br>Mileage: " . $this->mileage;
			echo "</br>Tax: " . $this->tax . "</br>";
		}

	}

	$car1 = new Car(2000, "35mph", "Full", "15mpg", 0.12);
	$car2 = new Car(2000, "5mph", "Not Full", "105mpg", 0.12);
	$car3 = new Car(2000, "15mph", "Kin of Full", "95mpg", 0.12);
	$car4 = new Car(2000, "25mph", "Full", "25mpg", 0.12);
	$car5 = new Car(2000, "45mph", "Empty", "25mpg", 0.12);
	$car6 = new Car(20000000, "35mph", "Empty", "15mpg", 0.15);

?>