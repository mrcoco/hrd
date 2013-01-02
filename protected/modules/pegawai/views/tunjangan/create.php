<?php
/* @var $this TunjanganController */
/* @var $model Tunjangan */

$this->breadcrumbs=array(
	'Tunjangan'=>array('admin'),
	'Buat',
);

$this->menu=array(
	array('label'=>'Kelola Tunjangan', 'url'=>array('admin')),
);
?>

<h1>Buat Tunjangan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>