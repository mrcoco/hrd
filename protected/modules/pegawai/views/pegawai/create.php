<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */

$this->breadcrumbs = array(
    'Pegawais' => array('admin'),
    'Buat',
);

$this->menu = array(
    array('label' => 'List Pegawai', 'url' => array('admin')),
    array('label' => 'Kelola Pegawai', 'url' => array('admin')),
);
?>

<h1>Buat Pegawai</h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'user' => $user, 'keluarga' => $keluarga)); ?>