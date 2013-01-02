<?php
/* @var $this LiburController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Liburs',
);

$this->menu=array(
	array('label'=>'Buat Libur', 'url'=>array('create')),
	array('label'=>'Kelola Libur', 'url'=>array('admin')),
);
?>

<h1>Liburs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
