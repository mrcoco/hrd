<?php
/* @var $this AbsenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Absens',
);

$this->menu=array(
	array('label'=>'Buat Absen', 'url'=>array('create')),
	array('label'=>'Kelola Absen', 'url'=>array('admin')),
);
?>

<h1>Absens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
