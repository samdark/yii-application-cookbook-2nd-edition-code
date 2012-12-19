<?php

class RangeForm extends CFormModel
{
	public $from;
	public $to;

	public function rules()
	{
		return array(
			array('from, to', 'numerical', 'integerOnly' => true),
			array('from', 'compare', 'compareAttribute' => 'to', 'operator' => '<=', 'skipOnError' => true),
		);
	}
}
