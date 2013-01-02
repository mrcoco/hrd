<?php
/* @var $this JabatanController */
/* @var $model Jabatan */

$this->breadcrumbs=array(
	'Jabatan'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Perbarui Jabatan',
);

$this->menu=array(
	array('label'=>'Buat Jabatan', 'url'=>array('create')),
	array('label'=>'Lihat Jabatan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Kelola Jabatan', 'url'=>array('admin')),
);
?>

<h1>Perbarui Jabatan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>