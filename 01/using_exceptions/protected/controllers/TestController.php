<?php
class TestController extends CController
{
	public function actionIndex($song)
	{
		$lyric = 'Nothing was found.';

		// importing api class
		Yii::import('application.apis.lyrics.LyricsFinder');

		$finder = new LyricsFinder();

		if(!empty($song))
		{
			// We don't want to show user an error.
			// Instead we want to apologize and
			// invite him to try again later.
			try {
				$lyric = $finder->getText($song);
			}
			// we are looking for specific exception here
			catch (LyricsFinderHTTPException $e)
			{
				echo 'Sorry, we cannot process your request. Try again later.';
			}
		}

		echo $lyric;
	}
}
