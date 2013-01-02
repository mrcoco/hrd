<?php
/* @var $this CutiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cutis',
);

$this->menu=array(
	array('label'=>'Buat Cuti', 'url'=>array('create')),
	array('label'=>'Kelola Cuti', 'url'=>array('admin')),
);
?>

<h1>Cutis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
