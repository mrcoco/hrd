<?php
/* @var $this TipeTunjanganController */
/* @var $model TipeTunjangan */

$this->breadcrumbs=array(
	'Tipe Tunjangan'=>array('admin'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Buat Tipe Tunjangan', 'url'=>array('create')),
	array('label'=>'Perbarui Tipe Tunjangan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Tipe Tunjangan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Tipe Tunjangan', 'url'=>array('admin')),
);
?>

<h1>Lihat Tipe Tunjangan</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'nama',
		'keterangan',
		/*'created',
		'updated',*/
	),
)); ?>
