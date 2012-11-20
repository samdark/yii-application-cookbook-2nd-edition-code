<?php
class DbtestController extends CController
{
	public function actionIndex()
	{
		// Get posts written in default application language
		$posts = Post::model()->findAll();

		echo '<h1>Default language</h1>';
		foreach($posts as $post)
		{
			echo '<h2>'.$post->title.'</h2>';
			echo $post->text;
		}

		// Get posts written in German
		$posts = Post::model()->lang('de')->findAll();

		echo '<h1>German</h1>';
		foreach($posts as $post)
		{
			echo '<h2>'.$post->title.'</h2>';
			echo $post->text;
		}
	}
}
