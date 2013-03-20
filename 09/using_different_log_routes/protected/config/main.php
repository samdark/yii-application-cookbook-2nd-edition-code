<?php
return array(
	//…
	'preload'=>array('log'),
	'components'=>array(
		//…
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class' => 'CEmailLogRoute',
					'categories' => 'example',
					'levels' => CLogger::LEVEL_ERROR,
					// change to your email
					'emails' => array('admin@example.com'),
					'sentFrom' => 'log@example.com',
					'subject' => 'Error at example.com',
				),
				array(
					'class' => 'CFileLogRoute',
					'levels' => CLogger::LEVEL_WARNING,
					'logFile' => 'warning.log',
				),
				array(
					'class' => 'CFileLogRoute',
					'levels' => CLogger::LEVEL_INFO,
					'logFile' => 'info.log	',
				),
				array(
					'class' => 'CWebLogRoute',
					'categories' => 'example',
					'levels' => CLogger::LEVEL_PROFILE,
					'showInFireBug' => true,
					'ignoreAjaxInFireBug' => true,
				),
				array(
					'class' => 'CWebLogRoute',
					'categories' => 'example',
				),
			),
		),
	),
);
