<?php
class TestController extends CController
{
	public function actionIndex()
	{
		$post = new Post();
		$post->title = "test title";
		$post->text = "test text";
		$post->save();
		echo date('r', $post->created_on);
	}
}