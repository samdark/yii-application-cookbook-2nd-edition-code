<?php
class LogController extends CController
{
	public function actionIndex()
	{
		Yii::trace('example trace message', 'example');

		Yii::log('info', CLogger::LEVEL_INFO, 'example');
		Yii::log('error', CLogger::LEVEL_ERROR, 'example');
		Yii::log('trace', CLogger::LEVEL_TRACE, 'example');
		Yii::log('warning', CLogger::LEVEL_WARNING, 'example');

		Yii::beginProfile('preg_replace', 'example');
		for($i=0;$i<10000;$i++){
			preg_replace('~^[ a-z]+~', '', 'test it');
		}
		Yii::endProfile('preg_replace', 'example');

		echo 'done';
	}
}
