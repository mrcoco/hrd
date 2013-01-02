<?php
$this->breadcrumbs=array(
	'Perjalanan Dinases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PerjalananDinas', 'url'=>array('index')),
	array('label'=>'Manage PerjalananDinas', 'url'=>array('admin')),
);
?>

<h1>Create PerjalananDinas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>