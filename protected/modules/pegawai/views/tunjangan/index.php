<?php
/* @var $this TunjanganController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tunjangans',
);

$this->menu=array(
	array('label'=>'Buat Tunjangan', 'url'=>array('create')),
	array('label'=>'Kelola Tunjangan', 'url'=>array('admin')),
);
?>

<h1>Tunjangans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
