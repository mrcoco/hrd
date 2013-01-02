<?php
/* @var $this PendidikanController */
/* @var $model Pendidikan */

$this->breadcrumbs=array(
	'Pendidikans'=>array('admin'),
	'Buat',
);

$this->menu=array(
	array('label'=>'List Pendidikan', 'url'=>array('admin')),
	array('label'=>'Kelola Pendidikan', 'url'=>array('admin')),
);
?>

<h1>Buat Pendidikan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>