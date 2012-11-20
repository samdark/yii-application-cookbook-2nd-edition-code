<?php
class SiteConfirmation extends CFormModel {
	public $url;

	public function rules()
	{
		return array(
			array('url', 'confirm'),
		);
	}

	public function confirm($attribute,$params)
   {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		if(trim($output)!='code here')
			$this->addError('url','Please upload file first.');
   }
}
