<?php
/* @var $this PendidikanController */
/* @var $model Pendidikan */

$this->breadcrumbs=array(
	'Pendidikans'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pendidikan', 'url'=>array('admin')),
	array('label'=>'Buat Pendidikan', 'url'=>array('create')),
	array('label'=>'Sunting Pendidikan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Pendidikan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Pendidikan', 'url'=>array('admin')),
);
?>

<h1>View Pendidikan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lembaga',
		'jenjang',
		'tahun',
		'created',
		'updated',
		'pegawai_id',
	),
)); ?>
