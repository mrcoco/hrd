<?php
/* @var $this KeluargaController */
/* @var $model Keluarga */

$this->breadcrumbs=array(
	'Keluargas'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Sunting',
);

$this->menu=array(
	array('label'=>'List Keluarga', 'url'=>array('admin')),
	array('label'=>'Buat Keluarga', 'url'=>array('create')),
	array('label'=>'View Keluarga', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Kelola Keluarga', 'url'=>array('admin')),
);
?>

<h1>Sunting Keluarga <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>