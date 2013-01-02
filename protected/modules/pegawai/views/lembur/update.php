<?php
/* @var $this LemburController */
/* @var $model Lembur */

$this->breadcrumbs = array(
    'Lembur' => array('admin', 'pid' => $model->pegawai->id),
    $model->pegawai->nama => array('pegawai/view/id/' . $model->pegawai->id),
    $model->id => array('view', 'id' => $model->id),
    'Perbarui Lembur',
);

$this->menu = array(
    array('label' => 'Buat Lembur', 'url' => array('create', 'pid' => $model->pegawai->id)),
    array('label' => 'Lihat Lembur', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Kelola Lembur', 'url' => array('admin', 'pid' => $model->pegawai->id)),
);
?>

<h1>Perbarui Lembur</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>