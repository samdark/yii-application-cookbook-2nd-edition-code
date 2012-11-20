<?php
class TaskController extends Controller
{
	public function filters()
	{
		return array(
			'ajaxOnly + field'
		);
	}

	public function actionIndex()
	{
		$models = array();

		if(!empty($_POST['Task']))
		{
			foreach($_POST['Task'] as $taskData)
			{
				$model = new Task();
				$model->setAttributes($taskData);
				if($model->validate())
					$models[] = $model;
			}
		}

		if(!empty($models)){
			// We've received some models and validated them.
			// If you want to save the data you can do it here.
		}
		else
			$models[] = new Task();

		$this->render('index', array(
			'models' => $models,
		));
	}

	public function actionField($index)
	{
		$model = new Task();
		$this->renderPartial('_task', array(
			'model' => $model,
			'index' => $index,
		));
	}
}
