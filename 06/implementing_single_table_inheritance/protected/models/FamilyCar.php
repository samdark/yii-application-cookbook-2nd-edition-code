<?php
class FamilyCar extends Car
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function defaultScope()
	{
        return array(
            'condition'=>"type='family'",
        );
    }
}
