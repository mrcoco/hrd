<?php
$this->breadcrumbs=array(
	'Perjalanan Dinases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PerjalananDinas', 'url'=>array('index')),
	array('label'=>'Create PerjalananDinas', 'url'=>array('create')),
	array('label'=>'Lihat PerjalananDinas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PerjalananDinas', 'url'=>array('admin')),
);
?>

<h1>Update PerjalananDinas <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>