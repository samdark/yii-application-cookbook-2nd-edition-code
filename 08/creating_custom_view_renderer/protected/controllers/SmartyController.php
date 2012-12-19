<?php

class SmartyController extends CController
{
	public function actionNative()
	{
		$this->render('native', array(
			'username' => 'Alexander',
		));
	}

	public function actionSmarty()
	{
		$this->render('smarty', array(
			'username' => 'Alexander',
		));
	}
}
