<?php
class PostController extends CController
{
	function actions()
	{
		return array(
//			'delete' => 'DeleteAction',
			'delete' => array(
				'class' => 'DeleteAction',
				'modelClass' => 'Post',
			 ),
		);
	}


	function actionIndex()
	{
		$posts = Post::model()->findAll();
		$this->render('index', array(
			'posts' => $posts,
		));
	}

//	function actionDelete($id)
//	{
//		$post = Post::model()->findByPk($id);
//		if(!$post)
//			throw new CHttpException(404);
//
//		if($post->delete())
//			$this->redirect('post/index');
//
//		throw new CHttpException(500);
//	}
}
