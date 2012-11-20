<h2>Total: <?php echo $total?></h2>
<h2>5 latest articles:</h2>
<?php foreach($articles as $article):?>
	<h3><?php echo $article->title?></h3>
	<div><?php echo $article->text?></div>
<?php endforeach ?>
