<?php

class TestController extends CController
{
	public function actionIndex()
	{
		$confirmation = new SiteConfirmation();
		$confirmation->url = 'http://yiicookbook.org/verify.html';
		if($confirmation->validate())
			echo 'OK';
		else
			echo 'Please upload a file.';
	}
}
