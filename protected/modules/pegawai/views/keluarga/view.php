<?php
/* @var $this KeluargaController */
/* @var $model Keluarga */

$this->breadcrumbs=array(
	'Keluargas'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Keluarga', 'url'=>array('admin')),
	array('label'=>'Buat Keluarga', 'url'=>array('create')),
	array('label'=>'Sunting Keluarga', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Keluarga', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Keluarga', 'url'=>array('admin')),
);
?>

<h1>View Keluarga #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'marital_status',
		'jumlah_anak',
		'created',
		'updated',
		'pegawai_id',
	),
)); ?>
