<?php
class PostController extends CController
{
	function actionView()
	{
		if(!isset($_GET['id']))
			// If there is no post ID supplied, request is definitely wrong.
			// According to HTTP specification its code is 400.
			throw new ChttpException(400);

		// Finding a post by its ID
		$post = Post::model()->findByPk($_GET['id']);

		if(!$post)
			// If there is no post with ID specified we'll generate
			// HTTP response with code 404 Not Found.
			throw new CHttpException(404);

		//  If everything is OK, render a post
		$this->render('post', array('model' => $post));
	}
}
