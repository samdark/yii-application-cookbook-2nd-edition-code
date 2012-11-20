<?php
class Car extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'car';
	}

	protected function instantiate($attributes)
	{
		switch($attributes['type'])
		{
			case 'sport':
				$class='SportCar';
			break;
			case 'family':
				$class='FamilyCar';
			break;
			default:
				$class=get_class($this);
		}
		$model=new $class(null);
		return $model;
	}
}