<?php
/* @var $this CutiController */
/* @var $model Cuti */

$this->breadcrumbs=array(
	'Cuti'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Perbarui Cuti',
);

$this->menu=array(
	array('label'=>'Buat Cuti', 'url'=>array('create')),
	array('label'=>'Lihat Cuti', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Kelola Cuti', 'url'=>array('admin')),
);
?>

<h1>Perbarui Cuti</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>