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
					'emails' => array('admin@example.com'),
					'sentFrom' => 'log@example.com',
					'subject' => 'Error at example.com',
				),
				array(
					'class' => 'CFileLogRoute',
					'levels' => CLogger::LEVEL_WARNING,
					'logFile' => 'A',
				),
				array(
					'class' => 'CFileLogRoute',
					'levels' => CLogger::LEVEL_INFO,
					'logFile' => 'B',
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
