<?php
class CronCommand extends CConsoleCommand
{
	public function run($args)
	{
		$filename = Yii::getPathOfAlias("application")."/timestamp.txt";
		file_put_contents($filename, time());
	}
}
