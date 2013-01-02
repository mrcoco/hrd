<?php
/* @var $this GajiController */
/* @var $model Gaji */

$this->breadcrumbs = array(
    'Gaji' => array('admin'),
    $model->pegawai->nama,
);

$this->menu = array(
    array('label' => 'Buat Gaji', 'url' => array('create', 'pid' => $model->pegawai->id)),
//	array('label'=>'Perbarui Gaji', 'url'=>array('update', 'id'=>$model->id)),
    array('label' => 'Hapus Gaji', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Kelola Gaji', 'url' => array('admin', 'pid' => $model->pegawai->id)),
);
?>

<h1>Lihat Gaji</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id',
        'jumlah_gaji',
        'jumlah_tunjangan',
        'jumlah_pajak',
        'jumlah_lembur',
        'jumlah_bonus',
        'total_gaji_bersih',
        'date',
        'pegawai_id',
    ),
));
?>
