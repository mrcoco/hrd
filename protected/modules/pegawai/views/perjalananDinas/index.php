<?php
$this->breadcrumbs=array(
	'Perjalanan Dinases',
);

$this->menu=array(
	array('label'=>'Create PerjalananDinas', 'url'=>array('create')),
	array('label'=>'Manage PerjalananDinas', 'url'=>array('admin')),
);
?>

<h1>Perjalanan Dinases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
