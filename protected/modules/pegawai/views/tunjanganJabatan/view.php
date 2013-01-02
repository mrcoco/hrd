<?php
/* @var $this TunjanganJabatanController */
/* @var $model TunjanganJabatan */

$this->breadcrumbs = array(
    'Tunjangan Jabatan' => array('admin'),
    $model->nilai,
);

$this->menu = array(
    array('label' => 'Buat Tunjangan Jabatan', 'url' => array('create')),
    array('label' => 'Perbarui Tunjangan Jabatan', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Hapus Tunjangan Jabatan', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Kelola Tunjangan Jabatan', 'url' => array('admin')),
);
?>

<h1>Lihat Tunjangan Jabatan</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'nilai',
        'created',
        'updated',
        'jabatan.jabatan_id',
        'tunjangan.tunjangan_id',
    ),
));
?>
