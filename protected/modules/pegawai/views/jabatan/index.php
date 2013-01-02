<?php
/* @var $this JabatanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jabatans',
);

$this->menu=array(
	array('label'=>'Buat Jabatan', 'url'=>array('create')),
	array('label'=>'Kelola Jabatan', 'url'=>array('admin')),
);
?>

<h1>Jabatans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
