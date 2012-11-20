<?php
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		 'modules'=>array(
			 'gii'=>array(
				 'class'=>'system.gii.GiiModule',
				 'password'=>false,
			 ),
		 ),
		 'components'=>array(
			 'db'=>array(
				 'class'=>'system.db.CDbConnection',
				 'connectionString'=>'mysql:host=localhost;dbname=example',
				 'username'=>'root',
				 'password'=>'',

				 'charset'=>'utf8',

				 'enableProfiling'=>true,
				 'enableParamLogging'=>true,
			 ),
			 'log'=>array(
				 'class'=>'CLogRouter',
				 'routes'=>array(
					 array(
						 'class'=>'CProfileLogRoute',
					 ),
				 ),
			 ),
		 ),
	)
);
