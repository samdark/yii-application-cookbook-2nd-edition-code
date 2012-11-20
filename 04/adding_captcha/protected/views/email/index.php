<?php if($success):?>
<p>Success!</p>
<?php endif?>

<?php echo CHtml::beginForm()?>
	<p>
		<?php echo CHtml::activeLabel($model, 'email')?>
		<?php echo CHtml::activeTextField($model, 'email')?>
		<?php echo CHtml::error($model, 'email')?>
	</p>
	
	<?php if(CCaptcha::checkRequirements()&& Yii::app()->user->isGuest):?>
	<p>
	<?php echo CHtml::activeLabelEx($model, 'verifyCode')?>
	<?php $this->widget('CCaptcha')?>
	</p>
	<p>
	<?php echo CHtml::activeTextField($model, 'verifyCode')?>
	<?php echo CHtml::error($model, 'verifyCode')?>
	</p>
	<?php endif?>

	<p>
		<?php echo CHtml::submitButton()?>
	</p>
<?php echo CHtml::endForm()?>
