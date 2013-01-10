<?php
$this->breadcrumbs=array(
	'Configurations',
);

$this->menu=array(
	array('label'=>'Buat Configuration', 'url'=>array('create')),
	array('label'=>'Kelola Configuration', 'url'=>array('admin')),
);
?>

<h1>Configurations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
