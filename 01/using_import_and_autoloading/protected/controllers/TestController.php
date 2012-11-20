<?php
class TestController extends CController
{
	public function actionIndex($song)
	{
		$lyric = 'Nothing was found.';
		
		// importing a class
		//Yii::import('application.apis.lyrics.LyricsFinder');

		$finder = new LyricsFinder();

		if(!empty($song))
			$lyric = $finder->getText($song);

		echo $lyric;
	}
}
