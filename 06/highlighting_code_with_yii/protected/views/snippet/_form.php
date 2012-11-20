<?php echo CHtml::beginForm()?>
<ul>
	<li>
		<?php echo CHtml::activeLabel($model, 'title')?>
		<?php echo CHtml::activeTextField($model, 'title')?>
	</li>
	<li>
		<?php echo CHtml::activeLabel($model, 'code')?>
		<?php echo CHtml::activeTextArea($model, 'code')?>
	</li>
	<li>
		<?php echo CHtml::activeLabel($model, 'language')?>
		<?php echo CHtml::activeDropDownList($model, 'language', $model->getSupportedLanguages())?>
	</li>
	<li>
		<?php echo CHtml::submitButton('Save')?>
	</li>
</ul>
<?php echo CHtml::endForm()?>