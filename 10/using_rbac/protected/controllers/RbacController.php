<?php
class RbacController extends CController
{
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
	{
		return array(
			array(
				'allow',
				'actions' => array('deletePost'),
				'roles' => array('deletePost'),
			),
			array(
				'allow',
				'actions' => array('init', 'test'),
			),
			array('deny'),
		);
	}


	public function actionInit()
	{
		$auth=Yii::app()->authManager;

		$auth->createOperation('createPost','create a post');
		$auth->createOperation('readPost','read a post');
		$auth->createOperation('updatePost','update a post');
		$auth->createOperation('deletePost','delete a post');

		$bizRule='return Yii::app()->user->id==$params["post"]->authID;';
		$task=$auth->createTask('updateOwnPost','update a post by author himself',$bizRule);
		$task->addChild('updatePost');

		$role=$auth->createRole('reader');
		$role->addChild('readPost');

		$role=$auth->createRole('author');
		$role->addChild('reader');
		$role->addChild('createPost');
		$role->addChild('updateOwnPost');

		$role=$auth->createRole('editor');
		$role->addChild('reader');
		$role->addChild('updatePost');

		$role=$auth->createRole('admin');
		$role->addChild('editor');
		$role->addChild('author');
		$role->addChild('deletePost');

		$auth->assign('reader','readerA');
		$auth->assign('author','authorB');
		$auth->assign('editor','editorC');
		$auth->assign('admin','adminD');

		echo "Done.";
	}

	public function actionDeletePost()
	{
		echo "Post deleted.";
	}

	public function actionTest()
	{
		$post = new stdClass();
		$post->authID = 'authorB';

		echo "Current permissions:<br />";
		echo "<ul>";
			echo "<li>Create post: ".Yii::app()->user->checkAccess('createPost')."</li>";
			echo "<li>Read post: ".Yii::app()->user->checkAccess('readPost')."</li>";
			echo "<li>Update post: ".Yii::app()->user->checkAccess('updatePost', array('post' => $post))."</li>";
			echo "<li>Delete post: ".Yii::app()->user->checkAccess('deletePost')."</li>";
		echo "</ul>";
	}
}
