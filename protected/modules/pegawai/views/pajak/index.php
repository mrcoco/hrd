<?php
$this->breadcrumbs=array(
	'Pajaks',
);

$this->menu=array(
	array('label'=>'Buat Pajak', 'url'=>array('create')),
	array('label'=>'Kelola Pajak', 'url'=>array('admin')),
);
?>

<h1>Pajaks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
