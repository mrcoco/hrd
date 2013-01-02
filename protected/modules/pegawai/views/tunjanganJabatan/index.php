<?php
/* @var $this TunjanganJabatanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tunjangan Jabatan',
);

$this->menu=array(
	array('label'=>'Buat TunjanganJabatan', 'url'=>array('create')),
	array('label'=>'Kelola TunjanganJabatan', 'url'=>array('admin')),
);
?>

<h1>Tunjangan Jabatans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
