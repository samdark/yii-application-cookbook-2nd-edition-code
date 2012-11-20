<?php
class XssController extends CController
{
	public function actionSimple()
	{
		echo 'Hello, '.CHtml::encode($_GET['username']).'!';
		echo CHtml::link(CHtml::encode($_GET['username']), array());
	}

	public function actionHtml()
	{
		$purifier=new CHtmlPurifier();
		echo $purifier->purify($_GET['html']);
	}
}
