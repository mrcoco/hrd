<?php
/* @var $this CutiController */
/* @var $model Cuti */

$this->breadcrumbs=array(
	'Cuti'=>array('admin'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Buat Cuti', 'url'=>array('create')),
	array('label'=>'Perbarui Cuti', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Cuti', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Cuti', 'url'=>array('admin')),
);
?>

<h1>Lihat Cuti</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'nama',
		'jatah',
		//'created',
		//'updated',
	),
)); ?>
