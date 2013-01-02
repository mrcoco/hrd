<?php
/* @var $this AbsenController */
/* @var $model Absen */

$this->breadcrumbs = array(
    'Absen' => array('admin', 'pid' => $model->pegawai->id),
    $model->pegawai->nama => array('pegawai/view/id/' . $model->pegawai->id),
    $model->id => array('view', 'id' => $model->id),
    'Perbarui',
);

$this->menu = array(
    array('label' => 'Buat Absen', 'url' => array('create', 'pid' => $model->pegawai->id)),
    array('label' => 'Lihat Absen', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Kelola Absen', 'url' => array('admin', 'pid' => $model->pegawai->id)),
);
?>

<h1>Perbarui Absen</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>