<?php
class UserController extends CController
{
	function actions()
	{
  		return array(
			'delete' => array(
				'class' => 'DeleteAction',
				'modelClass' => 'User',
			),
		);
	}
}