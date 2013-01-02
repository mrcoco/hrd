<?php
/* @var $this TunjanganController */
/* @var $model Tunjangan */

$this->breadcrumbs = array(
    'Tunjangan' => array('admin'),
    $model->nama,
);

$this->menu = array(
    array('label' => 'Buat Tunjangan', 'url' => array('create')),
    array('label' => 'Perbarui Tunjangan', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Hapus Tunjangan', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Kelola Tunjangan', 'url' => array('admin')),
);
?>

<h1>Lihat Tunjangan</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
//        'id',
//        'created',
//        'updated',
        'tipe_tunjangan_id',
        'nama',
        'keterangan',
    ),
));
?>
