<?php
/* @var $this GajiController */
/* @var $model Gaji */

$this->breadcrumbs = array(
    'Gaji' => array('admin', 'pid' => $model->pegawai->id),
    $model->pegawai->nama => array('view', 'id' => $model->id),
    'Perbarui Gaji',
);

$this->menu = array(
    array('label' => 'Buat Gaji', 'url' => array('create', 'pid' => $model->pegawai->id)),
    array('label' => 'Lihat Gaji', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Kelola Gaji', 'url' => array('admin', 'pid' => $model->pegawai->id)),
);
?>

<h1>Perbarui Gaji</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>