<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
$app = Yii::createWebApplication($config);

// adding custom Kohana autoloader
Yii::import("application.components.EKohanaAutoloader", true);
EKohanaAutoloader::$paths = array(Yii::getPathOfAlias("application.vendors.Kohana.modules.image"));
Yii::registerAutoloader(array('EKohanaAutoloader','loadClass'), true);

$app->run();
