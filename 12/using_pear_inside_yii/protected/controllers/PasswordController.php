<?php
class PasswordController extends CController
{
	public function actionIndex()
	{
		require "Text/Password.php";
		$textPassword = new Text_Password();
		$passwords = $textPassword->createMultiple(10, 8);
		echo "<ul>";
		foreach($passwords as $password)
		{
			echo "<li>".$password."</li>";
		}
		echo "</ul>";
	}
}
