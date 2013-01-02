<?php
/* @var $this PendidikanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pendidikans',
);

$this->menu=array(
	array('label'=>'Buat Pendidikan', 'url'=>array('create')),
	array('label'=>'Kelola Pendidikan', 'url'=>array('admin')),
);
?>

<h1>Pendidikans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
