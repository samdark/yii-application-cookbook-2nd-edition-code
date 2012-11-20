<?php
class Task extends CFormModel
{
	public $title;
	public $text;

	public function rules()
	{
		return array(
			array('title', 'required'),
			array('text', 'safe'),
		);
	}
}