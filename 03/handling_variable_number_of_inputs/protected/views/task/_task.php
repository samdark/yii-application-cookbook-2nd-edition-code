<li>
	<div class="row">
		<?php echo CHtml::activeLabel($model, "[$index]title")?>
		<?php echo CHtml::activeTextField($model, "[$index]title")?>
	</div>
	<div class="row">
		<?php echo CHtml::activeLabel($model, "[$index]text")?>
		<?php echo CHtml::activeTextArea($model, "[$index]text")?>
	</div>
</li>