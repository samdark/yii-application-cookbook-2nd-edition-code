<?php
class EKohanaAutoloader
{
	/**
	 * @var list of paths to search for classes.
	 * Add full paths to modules here.
	 */
	static $paths = array();

	/**
     * Class autoload loader.
     *
     * @static
     * @param string $className
     * @return boolean
     */
    static function loadClass($className)
	{
		if(!defined("SYSPATH"))
			define("SYSPATH", Yii::getPathOfAlias("application.vendors.Kohana.system"));

		if(empty(self::$paths))
			self::$paths = array(Yii::getPathOfAlias("application.vendors.Kohana.system"));

		$path = 'classes/'.str_replace('_', '/', strtolower($className)).'.php';

		foreach (self::$paths as $dir)
		{
			//echo $dir."/".$path."\n";
			if (is_file($dir."/".$path))
				require $dir."/".$path;
		}

		return false;
    }
}
