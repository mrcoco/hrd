<?php
/* @var $this TipeTunjanganController */
/* @var $model TipeTunjangan */

$this->breadcrumbs=array(
	'Tipe Tunjangan'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Perbarui Tipe Tunjangan',
);

$this->menu=array(
	array('label'=>'Buat Tipe Tunjangan', 'url'=>array('create')),
	array('label'=>'Lihat Tipe Tunjangan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Kelola TipeTunjangan', 'url'=>array('admin')),
);
?>

<h1>Perbarui Tipe Tunjangan </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>