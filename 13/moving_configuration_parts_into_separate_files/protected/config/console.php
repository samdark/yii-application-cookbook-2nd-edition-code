<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// autoloading model and component classes
	'import'=>require(dirname(__FILE__).'/import.php'),

	// application components
	'components'=>array(
		'db'=>require(dirname(__FILE__).'/db.php'),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);
