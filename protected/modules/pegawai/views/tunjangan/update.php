<?php
/* @var $this TunjanganController */
/* @var $model Tunjangan */

$this->breadcrumbs=array(
	'Tunjangan'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Perbarui Tunjangan',
);

$this->menu=array(
	array('label'=>'Buat Tunjangan', 'url'=>array('create')),
	array('label'=>'Lihat Tunjangan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Kelola Tunjangan', 'url'=>array('admin')),
);
?>

<h1>Perbarui Tunjangan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>