<?php
/* @var $this LemburController */
/* @var $model Lembur */

$this->breadcrumbs = array(
    'Lembur' => array('admin', 'pid' => $model->pegawai->id),
    $model->pegawai->nama => array('pegawai/view/id/' . $model->pegawai->id),
);

$this->menu = array(
    array('label' => 'Buat Lembur', 'url' => array('create', 'pid' => $model->pegawai->id)),
    array('label' => 'Perbarui Lembur', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Hapus Lembur', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Kelola Lembur', 'url' => array('admin', 'pid' => $model->pegawai->id)),
);
?>

<h1>Lihat Lembur</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'lama',
        'biaya',
        'tanggal',
    ),
));
?>
