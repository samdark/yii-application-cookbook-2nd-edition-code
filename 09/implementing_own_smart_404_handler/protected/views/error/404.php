<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>404</title>
	</head>
	<body>
        <h1>404</h1>

		<?php if(!empty($models)):?>
		<p>Probably you've searched for:</p>
		<ul>
			<?php foreach($models as $model):?>
				<li><a href="<?php echo $this->createUrl('article/view', array('id' => $model->alias))?>"><?php echo $model->title?></a></li>
			<?php endforeach?>
		</ul>
		<?php endif?>
	</body>
</html>
