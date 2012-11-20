<?php
class DbtestController extends CController
{
	public function actionIndex()
	{
		$post = new Post();
		$post->title = "Post #".rand(1, 1000);
		$post->text = "text";
		$post->save();

		echo '<h1>Posts</h1>';

		$posts = Post::model()->findAll();
		foreach($posts as $post)
		{
			echo $post->title."<br />";
		}

		$comment = new Comment();
		$comment->postId = $post->id;
		$comment->text = "comment #".rand(1, 1000);
		$comment->save();

		echo '<h1>Comments</h1>';

		$comments = Comment::model()->findAll();
		foreach($comments as $comment)
		{
			echo $comment->text."<br />";
		}
	}
}
