<?php
class TestController extends CController
{
	public function actionIndex()
	{
		echo "<h1>All cars</h1>";
		$cars = Car::model()->findAll();
		foreach($cars as $car)
		{
			// Each car can be of class Car, SportCar or FamilyCar
			echo get_class($car).' '.$car->name."<br />";
		}

		echo "<h1>Sport cars only</h1>";
		$sportCars = SportCar::model()->findAll();
		foreach($sportCars as $car)
		{
			// Each car should be SportCar
			echo get_class($car).' '.$car->name."<br />";
		}
	}
}