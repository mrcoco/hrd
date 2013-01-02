<?php
/* @var $this KeluargaController */
/* @var $model Keluarga */

$this->breadcrumbs=array(
	'Keluargas'=>array('admin'),
	'Buat',
);

$this->menu=array(
	array('label'=>'List Keluarga', 'url'=>array('admin')),
	array('label'=>'Kelola Keluarga', 'url'=>array('admin')),
);
?>

<h1>Buat Keluarga</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>