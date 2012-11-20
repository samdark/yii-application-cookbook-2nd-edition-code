<?php
class CronController extends CController
{
	public function actionIndex()
	{
		$filename = Yii::getPathOfAlias("application")."/timestamp.txt";
		file_put_contents($filename, time());
	}
}