<?php
class DeleteAction extends CAction
{
//	function run()
//	{
//		if(empty($_GET['id']))
//			throw new CHttpException(404);
//
//		$post = Post::model()->findByPk($_GET['id']);
//
//		if(!$post)
//			throw new CHttpException(404);
//
//		if($post->delete())
//			$this->redirect('post/index');
//
//		throw new CHttpException(500);
//	}

	public $pk = 'id';
	public $redirectTo = 'index';
	public $modelClass;

	function run()
	{
		if(empty($_GET[$this->pk]))
			throw new CHttpException(404);

		$model = CActiveRecord::model($this->modelClass)->findByPk($_GET[$this->pk]);

		if(!$model)
			throw new CHttpException(404);

		if($model->delete())
			$this->controller->redirect($this->redirectTo);

		throw new CHttpException(500);
	}
}
