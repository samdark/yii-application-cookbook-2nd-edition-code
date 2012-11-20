<?php
class SqlController extends CController
{
	public function actionSimple()
	{
		$userName = $_GET['username'];
		$password = md5($_GET['password']);
		$sql = "SELECT * FROM user WHERE username = '$userName' AND password = '$password' LIMIT 1;";
		$user = Yii::app()->db->createCommand($sql)->queryRow();
		if($user)
		{
			echo "Success";
		}
		else
		{
			echo "Failure";
		}
	}
	
	public function actionPrepared()
	{
		$userName = $_GET['username'];
		$password = md5($_GET['password']);
		$sql = "SELECT * FROM user WHERE username = :username AND password = :password LIMIT 1;";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue('username', $userName);
		$command->bindValue('password', $password);
		$user = $command->queryRow();
		if($user)
		{
			echo "Success";
		}
		else
		{
			echo "Failure";
		}
	}
	
	public function actionAr()
	{
		$userName = $_GET['username'];
		$password = md5($_GET['password']);

		$result = User::model()->exists("username = :username AND password = :password", array(
			'username' => $userName,
			'password' => $password,
		));
		if($result)
		{
			echo "Success";
		}
		else
		{
			echo "Failure";
		}
	}
	
	public function actionWrongAr()
	{
		$userName = $_GET['username'];
		$password = md5($_GET['password']);

		$result = User::model()->exists("username = $userName AND password = $password");
		if($result)
		{
			echo "Success";
		}
		else
		{
			echo "Failure";
		}
	}
	
	public function actionIn()
	{
		$criteria = new CDbCriteria();
		$criteria->addInCondition('username', array('Qiang', 'Alex'));
		$users = User::model()->findAll($criteria);
		foreach($users as $user)
		{
			echo $user->username."<br />";
		}
	}

	public function actionColumn()
	{
		$attr = $_GET['attr'];
		$value = $_GET['value'];

		$users = User::model()->findAllByAttributes(array($attr => $value));
		foreach($users as $user)
		{
			echo $user->username."<br />";
		}
	}
	
	public function actionWhitelist()
	{
		$attr = $_GET['attr'];
		$value = $_GET['value'];

		$allowedAttr = array('username', 'id');

		if(!in_array($attr, $allowedAttr))
			throw new CException("Attribute specified is not allowed.");

		$users = User::model()->findAllByAttributes(array($attr => $value));
		foreach($users as $user)
		{
			echo $user->username."<br />";
		}
	}
}
