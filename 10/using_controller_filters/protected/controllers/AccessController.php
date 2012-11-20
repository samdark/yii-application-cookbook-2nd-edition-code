<?php
class AccessController extends CController
{
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
	{
		return array(
			array(
				'deny',
				'expression' => 'strpos($_SERVER[\'HTTP_USER_AGENT\'], \'MSIE\') !== FALSE',
				'message' => "You're using the wrong browser, sorry.",
			),
			array(
				'allow',
				'actions' => array('authOnly'),
				'users' => array('@'),
			),
			array(
				'allow',
				'actions' => array('ip'),
				'ips' => array('127.0.0.1'),
			),
			array(
				'allow',
				'actions' => array('user'),
				'users' => array('admin'),
			),
			array('deny'),
		);
	}


	public function actionAuthOnly()
	{
		echo "Looks like you are authorized to run me.";
	}

	public function actionIp()
	{
		echo "Your IP is in our list. Lucky you!";
	}

	public function actionUser()
	{
		echo "You're the right man. Welcome!";
	}
}
