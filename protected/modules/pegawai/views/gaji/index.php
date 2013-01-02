<?php
/* @var $this GajiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gajis',
);

$this->menu=array(
	array('label'=>'Buat Gaji', 'url'=>array('create', 'pid' => $model->pegawai->id)),
	array('label'=>'Kelola Gaji', 'url'=>array('admin', 'pid' => $model->pegawai->id)),
);
?>

<h1>Gajis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
