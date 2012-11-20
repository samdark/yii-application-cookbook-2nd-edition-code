<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';

if($_SERVER['HTTP_HOST']=='example.com')
{
	$config=dirname(__FILE__).'/../protected/config/production.php';
}
else
{
	// remove the following lines when in production mode
	defined('YII_DEBUG') or define('YII_DEBUG',true);
	// specify how many levels of call stack should be shown in each log message
	defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
	$config=dirname(__FILE__).'/../protected/config/development.php';
}

require_once($yii);
Yii::createWebApplication($config)->run();
