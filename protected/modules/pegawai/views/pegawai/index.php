<?php
/* @var $this PegawaiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pegawais',
);

$this->menu=array(
	array('label'=>'Buat Pegawai', 'url'=>array('create')),
	array('label'=>'Kelola Pegawai', 'url'=>array('admin')),
);
?>

<h1>Pegawais</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
