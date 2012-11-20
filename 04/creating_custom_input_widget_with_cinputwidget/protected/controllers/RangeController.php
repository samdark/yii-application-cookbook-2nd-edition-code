<?php
class RangeController extends Controller
{
	function actionIndex()
	{
		$success = false;
		$model = new RangeForm();
		if(!empty($_POST['RangeForm']))
		{
			$model->setAttributes($_POST['RangeForm']);
			if($model->validate())
				$success = true;
		}

		$this->render('index', array(
			'model' => $model,
			'success' => $success,
	    ));
	}
}
