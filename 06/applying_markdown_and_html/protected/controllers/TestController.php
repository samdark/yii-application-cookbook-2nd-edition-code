<?php
class TestController extends CController
{
	function actionIndex()
	{
		$post = new Post();
		$post->title = "I promise to share my opinion on Yii framework";
		$post->text = "Recently I’ve started using [Yii framework](http://www.yiiframework.com/) and definitely will share my opinion as soon as I’ll have some more free time.";
		$post->save();

		echo "<h1>$post->title</h1>";
		echo $post->html;
	}
}