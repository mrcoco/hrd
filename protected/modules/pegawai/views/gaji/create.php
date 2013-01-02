<?php
/* @var $this GajiController */
/* @var $model Gaji */

$this->breadcrumbs = array(
    'Gaji' => array('admin', 'pid' => $model->pegawai->id),
    'Buat Gaji',
);

$this->menu = array(
    array('label' => 'Kelola Gaji', 'url' => array('admin', 'pid' => $model->pegawai->id)),
);
?>

<h1>Buat Gaji</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>