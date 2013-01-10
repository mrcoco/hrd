<?php
/* @var $this BonusController */
/* @var $model Bonus */

$this->breadcrumbs = array(
    'Bonuses' => array('admin', 'pid' => $model->pegawai->id),
    $model->pegawai->nama => array('pegawai/view/id/' . $model->pegawai->id),
    $model->nama
);

$this->menu = array(
    array('label' => 'Buat Bonus', 'url' => array('create', 'pid' => $model->pegawai->id)),
    array('label' => 'Sunting Bonus', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Hapus Bonus', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Kelola Bonus', 'url' => array('admin', 'pid' => $model->pegawai->id)),
);
?>

<h1>Lihat Bonus <?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'pegawai_id',
        'tanggal',
        'nama',
        'keterangan',
        'besar',
    ),
));
?>
