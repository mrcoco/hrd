<?php
/* @var $this LemburController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lemburs',
);

$this->menu=array(
	array('label'=>'Buat Lembur', 'url'=>array('create')),
	array('label'=>'Kelola Lembur', 'url'=>array('admin')),
);
?>

<h1>Lemburs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
