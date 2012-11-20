<h2><?php echo CHtml::link('Snippets', array('index'))?> → <?php echo CHtml::encode($model->title)?></h2>
<?php echo CHtml::link('Edit', array('edit', 'id' => $model->id))?>
<div>
	<?php echo $model->html?>
</div>