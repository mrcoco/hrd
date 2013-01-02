<?php
/* @var $this TipeTunjanganController */
/* @var $model TipeTunjangan */

$this->breadcrumbs=array(
	'Tipe Tunjangans'=>array('admin'),
	'Buat TIpe Tunjangan',
);

$this->menu=array(
	array('label'=>'Kelola Tipe Tunjangan', 'url'=>array('admin')),
);
?>

<h1>Buat Tipe Tunjangan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>