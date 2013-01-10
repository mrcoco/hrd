<?php
/* @var $this PendidikanController */
/* @var $model Pendidikan */

$this->breadcrumbs=array(
	'Pendidikans'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Sunting',
);

$this->menu=array(
	array('label'=>'List Pendidikan', 'url'=>array('admin')),
	array('label'=>'Buat Pendidikan', 'url'=>array('create')),
	array('label'=>'Lihat Pendidikan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Kelola Pendidikan', 'url'=>array('admin')),
);
?>

<h1>Sunting Pendidikan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>