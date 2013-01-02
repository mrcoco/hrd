<?php
/* @var $this CutiController */
/* @var $model Cuti */

$this->breadcrumbs=array(
	'Cuti'=>array('admin'),
	'Buat',
);

$this->menu=array(
	array('label'=>'Kelola Cuti', 'url'=>array('admin')),
);
?>

<h1>Buat Cuti</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>