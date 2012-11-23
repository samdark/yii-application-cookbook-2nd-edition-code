<?php
class JsonApiController extends CController
{
	const RESPONSE_OK = 'OK';
	const RESPONSE_NO_DATA = 'No data';
	const RESPONSE_NOT_FOUND = 'Not found';
	const RESPONSE_VALIDATION_ERRORS = 'Validation errors';

	public $modelName;

	public function init()
	{
		parent::init();
		if(empty($this->modelName))
			throw new CException("You should set modelName before using JsonApiController.");
	}

	public function actionCreate()
	{
		if(empty($_POST))
			$this->respond(400, self::RESPONSE_NO_DATA);

		$model = new $this->modelName;
		$model->setAttributes($_POST);

		if($model->save())
			$this->respond(200, self::RESPONSE_OK);
		else
			$this->respond(400, self::RESPONSE_VALIDATION_ERRORS, $model->getErrors());
	}

	public function actionGet($pk)
	{
		$model = CActiveRecord::model($this->modelName)->findByPk($pk);
		if(!$model)
			$this->respond(404, self::RESPONSE_NOT_FOUND);

		$this->respond(200, self::RESPONSE_OK, $model->getAttributes());
	}

	public function actionUpdate($pk)
	{
		if(empty($_POST))
			$this->respond(400, self::RESPONSE_NO_DATA);

		$model = CActiveRecord::model($this->modelName)->findByPk($pk);
		if(!$model)
			$this->respond(404, self::RESPONSE_NOT_FOUND);

		$model->setAttributes($_POST);
		if($model->save())
			$this->respond(200, self::RESPONSE_OK);
		else
			$this->respond(400, self::RESPONSE_VALIDATION_ERRORS, $model->getErrors());
	}

	public function actionDelete($pk)
	{
		if(CActiveRecord::model($this->modelName)->deleteByPk($pk))
		{
			$this->respond(200, self::RESPONSE_OK);
		}
		else {
			$this->respond(404, self::RESPONSE_NOT_FOUND);
		}
	}

	protected function respond($httpCode, $status, $data = array())
	{
		$response['status'] = $status;
		$response['data'] = $data;

		echo CJSON::encode($response);

		Yii::app()->end($httpCode, true);
	}
}
