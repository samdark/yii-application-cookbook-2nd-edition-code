<?php
class EmailController extends Controller
{
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'MathCaptchaAction',
				'minLength' => 1,
				'maxLength' => 10,
			),
		);
	}

	public function actionIndex()
	{
		$success = false;

		$model = new EmailForm();
		if(!empty($_POST['EmailForm']))
		{
			$model->setAttributes($_POST['EmailForm']);
			if($model->validate())
			{
				$success = true;
				// handle form here
			}
		}
		$this->render('index', array(
			'model' => $model,
			'success' => $success,
	    ));
	}
}
