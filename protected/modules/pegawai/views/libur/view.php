<?php
/* @var $this LiburController */
/* @var $model Libur */

$this->breadcrumbs=array(
	'Libur'=>array('admin'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Buat Libur', 'url'=>array('create')),
	array('label'=>'Perbarui Libur', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Libur', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Libur', 'url'=>array('admin')),
);
?>

<h1>Lihat Libur</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'tanggal',
		'nama',
		'recuring',
		/*'created',
		'updated',*/
	),
)); ?>
