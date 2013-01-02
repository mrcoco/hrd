<?php
/* @var $this LiburController */
/* @var $model Libur */

$this->breadcrumbs=array(
	'Libur'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Perbarui Libur',
);

$this->menu=array(
	array('label'=>'Buat Libur', 'url'=>array('create')),
	array('label'=>'Lihat Libur', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Kelola Libur', 'url'=>array('admin')),
);
?>

<h1>Perbarui Libur</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>