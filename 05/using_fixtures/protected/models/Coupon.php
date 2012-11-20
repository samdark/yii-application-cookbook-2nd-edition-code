<?php
class Coupon extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName() {
		return 'coupon';
	}

	public function rules() {
		return array(
            array('description', 'required'),
		);
	}
}