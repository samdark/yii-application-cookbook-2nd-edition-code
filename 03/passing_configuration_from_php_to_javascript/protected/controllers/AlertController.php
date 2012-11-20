<?php
class AlertController extends Controller
{
	function actionIndex()
	{
		$config = CJavaScript::encode(Yii::app()->params->toArray());
		Yii::app()->clientScript->registerScript('appConfig', "var config = ".$config.";", CClientScript::POS_HEAD);

		$this->render('index');
	}
}