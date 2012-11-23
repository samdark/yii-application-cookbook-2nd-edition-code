<h2>Editing <?php echo CHtml::encode($model->id)?></h2>

<?php echo CHtml::beginForm()?>
	<?php echo CHtml::activeTextArea($model, 'text', array('cols' => 100, 'rows' => 20))?>
	<br /><br />
	<?php echo CHtml::submitButton('Done')?>
<?php echo CHtml::endForm()?>