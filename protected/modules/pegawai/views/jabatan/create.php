<?php
/* @var $this JabatanController */
/* @var $model Jabatan */

$this->breadcrumbs=array(
	'Jabatan'=>array('admin'),
	'Dafttar Jabatan',
);

$this->menu=array(
	array('label'=>'Kelola Jabatan', 'url'=>array('admin')),
);
?>

<h1>Buat Jabatan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>