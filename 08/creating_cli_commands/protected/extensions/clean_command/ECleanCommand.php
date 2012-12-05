<?php
class ECleanCommand extends CConsoleCommand
{
	public $webRoot;

public function getHelp()
{
	$out = "Clean command allows you to clean up various temporary data Yii and an application are generating.\n\n";
	return $out.parent::getHelp();
}

	public function actionCache()
	{
		$cache=Yii::app()->getComponent('cache');
		if($cache!==null){
			$cache->flush();
			echo "Done.\n";
		}
		else {
			echo "Please configure cache component.\n";
		}
	}

	public function actionAssets()
	{
		if(empty($this->webRoot))
		{
			echo "Please specify a path to webRoot in command properties.\n";
			Yii::app()->end();
		}

		$this->cleanDir($this->webRoot.'/assets');

		echo "Done.\n";
	}

	public function actionRuntime()
	{
		$this->cleanDir(Yii::app()->getRuntimePath());
		echo "Done.\n";
	}

	private function cleanDir($dir)
	{
		$di = new DirectoryIterator($dir);
		foreach($di as $d)
		{
			if(!$d->isDot())
			{
				echo "Removed ".$d->getPathname()."\n";
				$this->removeDirRecursive($d->getPathname());
			}
		}
	}

	private function removeDirRecursive($dir)
	{
		$files = glob($dir.DIRECTORY_SEPARATOR.'{,.}*', GLOB_MARK | GLOB_BRACE);
		foreach($files as $file)
		{
			if(basename($file) == '.' || basename($file) == '..')
				continue;

			if(substr($file, - 1) == DIRECTORY_SEPARATOR)
				$this->removeDirRecursive($file);
			else
				unlink($file);
		}
		if(is_dir($dir))
			rmdir($dir);
	}
}