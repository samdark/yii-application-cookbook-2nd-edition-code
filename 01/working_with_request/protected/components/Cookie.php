<?php
class Cookie
{
	public static function get($name)
	{
		$cookie=Yii::app()->request->cookies[$name];
		if(!$cookie)
			return null;

		return $cookie->value;
	}

	public static function set($name, $value, $expiration=0)
	{
		$cookie=new CHttpCookie($name,$value);
		$cookie->expire = $expiration;
		Yii::app()->request->cookies[$name]=$cookie;
	}
}
