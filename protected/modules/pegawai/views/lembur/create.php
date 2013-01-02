<?php
/* @var $this LemburController */
/* @var $model Lembur */

$this->breadcrumbs = array(
    'Lembur' => array('admin', 'pid' => $model->pegawai->id),
    $model->pegawai->nama => array('pegawai/view/id/' . $model->pegawai->id),
    'Buat Lembur',
);

$this->menu = array(
    array('label' => 'Kelola Lembur', 'url' => array('admin', 'pid' => $model->pegawai->id)),
);
?>

<h1>Buat Lembur</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>