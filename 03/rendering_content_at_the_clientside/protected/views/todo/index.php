<?php
Yii::app()->clientScript->registerPackage('todo');
$options = json_encode(array(
	'taskEndpoint' => $this->createUrl('todo/task'),
));
Yii::app()->clientScript->registerScript('todo', "todo.init($options);", CClientScript::POS_READY);
?>

<div class="todo-index">
	<div class="status"></div>
	<div class="tasks"></div>
	<div class="new-task">
    <?php echo CHtml::beginForm()?>
		<?php echo CHtml::activeTextField($task, 'title')?>
		<?php echo CHtml::submitButton('Add')?>
	<?php echo CHtml::endForm()?>
	</div>
</div>

<script id="template-task" type="text/x-dot-template">
	<div class="task" data-id="{{!it.id}}">
		<input type="checkbox"{{? it.done==1}}checked {{?}}/>
		<input type="text" value="{{!it.title}}" />
		<a href="#delete" class="delete">Remove</a>
	</div>
</script>