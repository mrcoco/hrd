<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */

$this->breadcrumbs = array(
    'Pegawais' => array('admin'),
    $model->id => array('view', 'id' => $model->id),
    'Sunting',
);

$this->menu = array(
    array('label' => 'List Pegawai', 'url' => array('admin')),
    array('label' => 'Buat Pegawai', 'url' => array('create')),
    array('label' => 'Lihat Pegawai', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Kelola Pegawai', 'url' => array('admin')),
);
?>

<h1>Sunting Pegawai <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'user' => $user, 'keluarga' => $keluarga)); ?>