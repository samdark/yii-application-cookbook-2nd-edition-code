<?php
class SportCar extends Car
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function defaultScope()
	{
		return array(
			'condition'=>"type='sport'",
		);
	}
}