<?php
/* @var $this TunjanganJabatanController */
/* @var $model TunjanganJabatan */

$this->breadcrumbs=array(
	'Tunjangan Jabatan'=>array('admin'),
	'Buat Tunjangan Jabatan',
);

$this->menu=array(
	array('label'=>'Kelola Tunjangan Jabatan', 'url'=>array('admin')),
);
?>

<h1>Buat Tunjangan Jabatan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>