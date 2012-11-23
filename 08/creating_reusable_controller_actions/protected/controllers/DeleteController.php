<?php
class DeleteController extends CController
{
	public function actions()
	{
		return array(
			'deletePost' => array(
				'class' => 'ext.actions.EDeleteAction',
				'modelName' => 'Post',
				'redirectTo' => array('indexPosts'),
			),
			'deleteComment' => array(
				'class' => 'ext.actions.EDeleteAction',
				'modelName' => 'Comment',
				'redirectTo' => array('indexComments'),
			),
		);
	}

	public function actionIndexPosts()
	{
		echo "I'm index action for Posts.";
	}

	public function actionIndexComments()
	{
		echo "I'm index action for Comments.";
	}
}
