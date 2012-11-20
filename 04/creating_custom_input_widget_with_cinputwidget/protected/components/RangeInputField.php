<?php
class RangeInputField extends CInputWidget
{
	public $attributeFrom;
	public $attributeTo;

	public $nameFrom;
	public $nameTo;

	public $valueFrom;
	public $valueTo;

	function run()
	{
		if($this->hasModel())
		{
			echo CHtml::activeTextField($this->model, $this->attributeFrom);
			echo ' &rarr; ';
			echo CHtml::activeTextField($this->model, $this->attributeTo);
		}
		else {
			echo CHtml::textField($this->nameFrom, $this->valueFrom);
			echo ' &rarr; ';
			echo CHtml::textField($this->nameTo, $this->valueTo);
		}
	}
}
