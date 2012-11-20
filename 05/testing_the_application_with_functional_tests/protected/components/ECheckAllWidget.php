<?php
class ECheckAllWidget extends CWidget
{
	public $checkedTitle = 'Uncheck all';
	public $uncheckedTitle = 'Check all';

	public function run()
	{
		Yii::app()->clientScript->registerCoreScript('jquery');
		echo CHtml::button($this->uncheckedTitle, array(
			'id' => 'button-'.$this->id,
			'class' => 'check-all-btn',
			'onclick' => '
				switch($(this).val())
				{
					case "'.$this->checkedTitle.'":
						$(this).val("'.$this->uncheckedTitle.'");
						$("input[type=checkbox]").attr("checked", false);
					break;
					case "'.$this->uncheckedTitle.'":
						$(this).val("'.$this->checkedTitle.'");
						$("input[type=checkbox]").attr("checked", true);
					break;
				}
			'
		));
	}
}
