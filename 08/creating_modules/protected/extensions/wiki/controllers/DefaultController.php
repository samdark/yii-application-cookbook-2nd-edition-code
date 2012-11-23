<?php
class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->actionView('index');
	}

	public function actionView($id)
	{
		$model = Wiki::model()->findByPk($id);
		if(!$model)
		{
			$this->actionEdit($id);
			Yii::app()->end();
		}

		$this->render('view', array(
			'model' => $model,
		));
	}

	public function actionEdit($id)
	{
		$model = Wiki::model()->findByPk($id);
		if(!$model)
		{
			$model = new Wiki();
			$model->id = $id;
		}

		if(!empty($_POST['Wiki']))
		{
			if(!empty($_POST['Wiki']['text']))
			{
				$model->text = $_POST['Wiki']['text'];
				if($model->save())
					$this->redirect(array('view', 'id' => $id));
			}
			else
			{
				Wiki::model()->deleteByPk($id);
			}
		}

		$this->render('edit', array(
			'model' => $model
		));
	}
}