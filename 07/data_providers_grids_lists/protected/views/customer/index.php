<?php
$this->breadcrumbs=array(
	'Customers',
);

$this->menu=array(
	array('label'=>'Create Customer', 'url'=>array('create')),
	array('label'=>'Manage Customer', 'url'=>array('admin')),
);
?>

<h1>Customers</h1>

<style type="text/css">
ol.customers {
	list-style: none;
	margin: 1em 0;
}

ol.customers>li {
	margin: 1em;
	padding:1em;
	background: #fcfcfc;
	border: 1px solid #9aafe5;
}
</style>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'itemsTagName' => 'ol',
	'itemsCssClass' => 'customers',
	'sortableAttributes'=>array(
		'last_name',
		'email',
	),
	'template' => '{sorter} {pager} {items} {sorter} {pager}',
)); ?>
