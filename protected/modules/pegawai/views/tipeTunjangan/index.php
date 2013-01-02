<?php
/* @var $this TipeTunjanganController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipe Tunjangans',
);

$this->menu=array(
	array('label'=>'Buat TipeTunjangan', 'url'=>array('create')),
	array('label'=>'Kelola TipeTunjangan', 'url'=>array('admin')),
);
?>

<h1>Tipe Tunjangans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
