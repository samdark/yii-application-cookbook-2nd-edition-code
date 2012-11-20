<?php
class TodoController extends CController
{
	public function actionIndex()
	{
		$task = new Task();
		$this->render('index', array(
			'task' => $task,
		));
	}

	public function actionTask()
	{
		$req = Yii::app()->request;
		if($req->getIsPostRequest()) {
			$this->handlePost($req->getPost('id'), $req->getPost('Task'));
		}
		elseif($req->isPutRequest) {
			$this->handlePut($req->getPut('Task'));
		}
		elseif($req->isDeleteRequest) {
			$this->handleDelete($req->getDelete('id'));
		}
		else {
			$this->handleGet($req->getParam('id'));
		}
	}

	private function handleGet($id)
	{
		if($id) {
			$task = $this->getTask($id);
			$this->sendResponse($task->attributes);
		}
		else {
			$data = array();
			$tasks = Task::model()->findAll(array('order' => 'id'));
			foreach($tasks as $task) {
				$data[] = $task->attributes;
			}
			$this->sendResponse($data);
		}
	}

	private function handlePut($data)
	{
		$task = new Task();
		$this->saveTask($task, $data);
	}

	private function handlePost($id, $data)
	{
		$task = $this->getTask($id);
		$this->saveTask($task, $data);
	}

	private function saveTask($task, $data)
	{
		if(!is_array($data)) {
			$this->sendResponse(array(), 400, array('No data provided.'));
		}

		$task->attributes = $data;
		if($task->save()) {
			$this->sendResponse($task->attributes);
		} else {
			$errors = array();
			foreach($task->errors as $fieldErrors) {
				foreach($fieldErrors as $error) {
					$errors[] = $error;
				}
			}
			$this->sendResponse(array(), 400, $errors);
		}
	}

	private function handleDelete($id)
	{
		$task = $this->getTask($id);
		if($task->delete()) {
			$this->sendResponse($task->attributes);
		}
		else {
			$this->sendResponse(array(), 500, array('Unable to delete task.'));
		}
	}

	private function getTask($id)
	{
		$task = Task::model()->findByPk($id);
		if(!$task) {
			$this->sendResponse(array(), 404, array('Task not found.'));
		}

		return $task;
	}

	private function sendResponse($data, $responseCode = 200, $errors = array())
	{
		$messages = array(
			200 => 'OK',
			201 => 'Created',
			400 => 'Bad Request',
			404 => 'Not Found',
			500 => 'Internal Server Error',
		);

		if(in_array($responseCode, array_keys($messages))) {
			header("HTTP/1.0 $responseCode ".$messages[$responseCode], true, $responseCode);
		}

		echo json_encode(array(
			'errors' => $errors,
			'data' => $data,
		));
		Yii::app()->end();
	}
}