<?php
/* @var $this AbsenController */
/* @var $model Absen */

$this->breadcrumbs = array(
    'Absen' => array('admin', 'pid' => $model->pegawai->id),
    $model->pegawai->nama => array('pegawai/view/id/' . $model->pegawai->id),
);

$this->menu = array(
    array('label' => 'Buat Absen', 'url' => array('create', 'pid' => $model->pegawai->id)),
    array('label' => 'Perbarui Absen', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Hapus Absen', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Kelola Absen', 'url' => array('admin', 'pid' => $model->pegawai->id)),
);
?>

<h1>Lihat Absen</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id',
        'cuti_id',
        'tanggal',
        'keterangan',
        'jam_masuk',
        'jam_keluar',
        'is_present',
    ),
));
?>
