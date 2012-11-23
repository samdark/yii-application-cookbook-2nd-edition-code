<?php
class WebUser extends CWebUser {
	private $_model = null;

	function getRole() {
		if($user = $this->getModel()){
			return $user->role;
		}
		else return 'guest';
	}

	private function getModel(){
		if($this->_model === null){
			if($this->id === null) return null;
			$this->_model = User::model()->findByPk($this->id);
		}
		return $this->_model;
	}
}
