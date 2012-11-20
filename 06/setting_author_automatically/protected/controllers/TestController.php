<?php
class TestController extends CController
{
	public function actionIndex()
	{
		$post = Post::model()->find();
		if(!$post)
			$post = new Post();

		$post->title = 'test';
		$post->text = 'test';
		$post->save();
		echo $post->author_id;
	}
}