<?php
/* @var $this TunjanganJabatanController */
/* @var $model TunjanganJabatan */

$this->breadcrumbs=array(
	'Tunjangan Jabatan'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Perbarui Tunjangan Jabatan',
);

$this->menu=array(
	array('label'=>'Buat Tunjangan Jabatan', 'url'=>array('create')),
	array('label'=>'Lihat Tunjangan Jabatan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Kelola Tunjangan Jabatan', 'url'=>array('admin')),
);
?>

<h1>Perbarui Tunjangan Jabatan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>