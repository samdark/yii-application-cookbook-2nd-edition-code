<?php
class RemoteFileValidator extends CValidator
{
	public $content = '';

	protected function validateAttribute($object,$attribute)
	{
		$value=$object->$attribute;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $value);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);

		if(trim($output)!=$this->content)
			$this->addError($object,$attribute,'Please upload file first.');
	}
}
