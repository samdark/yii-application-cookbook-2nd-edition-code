<?php

class EmailForm extends CFormModel
{
	public $verifyCode;
	public $email;

	public function rules()
	{
        return array(
			array('email', 'email'),
			array('verifyCode', 'captcha', 'allowEmpty'=> !CCaptcha::checkRequirements()),
		);
	}
}
