<?php
/* @var $this LiburController */
/* @var $model Libur */

$this->breadcrumbs=array(
	'Libur'=>array('admin'),
	'Buat Libur',
);

$this->menu=array(
	array('label'=>'Kelola Libur', 'url'=>array('admin')),
);
?>

<h1>Buat Libur</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>