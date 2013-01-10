<?php
$this->breadcrumbs=array(
	'Perjalanan Dinases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PerjalananDinas', 'url'=>array('index')),
	array('label'=>'Create PerjalananDinas', 'url'=>array('create')),
	array('label'=>'Update PerjalananDinas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PerjalananDinas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PerjalananDinas', 'url'=>array('admin')),
);
?>

<h1>Lihat PerjalananDinas <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lama',
		'biaya',
		'tanggal',
		'created',
		'updated',
		'pegawai_id',
	),
)); ?>
