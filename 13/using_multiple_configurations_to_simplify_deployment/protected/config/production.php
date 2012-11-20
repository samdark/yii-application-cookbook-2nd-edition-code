<?php
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		 'components'=>array(
			 'db'=>array(
				 'class'=>'system.db.CDbConnection',

				 'connectionString'=>'mysql:host=localhost;dbname=example',
				 'username'=>'example',
				 'password'=>'2WXyVNb4dBSEK3HW',

				 'charset'=>'utf8',

				 'schemaCachingDuration'=>60*60,
			 ),
			 'cache'=>array(
				 'class'=>'CFileCache',
			 ),
		 ),
	)
);
