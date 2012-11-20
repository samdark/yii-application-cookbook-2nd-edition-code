<?php
class EmailForm extends CFormModel
{
	public $verifyCode;
	public $email;

	function rules(){
        return array(
			array('email', 'email'),
         array('verifyCode', 'captcha', 'allowEmpty'=> !CCaptcha::checkRequirements()),
        );
    }
}
