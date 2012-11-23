<?php
class EDeleteAction extends CAction
{
	public $modelName;
	public $redirectTo = array('index');

	/**
	 * Runs the action.
	 * This method is invoked by the controller owning this action.
	 */
	public function run($pk)
	{
		CActiveRecord::model($this->modelName)->deleteByPk($pk);
		if(Yii::app()->getRequest()->getIsAjaxRequest())
		{
			Yii::app()->end(200, true);
		}
		else
		{
			$this->getController()->redirect($this->redirectTo);
		}
	}
}
