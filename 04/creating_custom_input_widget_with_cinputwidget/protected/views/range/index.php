<?php if($success):?>
<p>Success!</p>
<?php endif?>

<?php echo CHtml::errorSummary($model)?>
<?php echo CHtml::beginForm()?>
	<?php $this->widget('RangeInputField', array(
		'model' => $model,
		'attributeFrom' => 'from',
		'attributeTo' => 'to',
	))?>
	<?php echo CHtml::submitButton('Submit')?>
<?php echo CHtml::endForm()?>
