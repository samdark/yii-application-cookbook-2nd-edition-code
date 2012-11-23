<?php
class SmartyController extends Controller
{
	function actionNative()
	{
		$this->render('native', array(
			'username' => 'Alexander',
		));
	}

	function actionSmarty()
	{
		$this->render('smarty', array(
			'username' => 'Alexander',
		));
	}
}
