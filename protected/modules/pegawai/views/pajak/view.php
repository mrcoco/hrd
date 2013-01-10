<?php
$this->breadcrumbs = array(
    'Pajaks' => array('admin'),
    $model->nama,
);

$this->menu = array(
    array('label' => 'Buat Pajak', 'url' => array('create')),
    array('label' => 'Sunting Pajak', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Hapus Pajak', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Kelola Pajak', 'url' => array('admin')),
);
?>

<h1>Lihat Pajak <?php echo $model->nama; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'nama',
        array(
            'name' => 'min_gaji',
            'type' => 'raw',
            'value' => 'Rp. ' . number_format($model->min_gaji, 2, ',', '.')
        ),
        array(
            'name' => 'max_gaji',
            'type' => 'raw',
            'value' => 'Rp. ' . number_format($model->max_gaji, 2, ',', '.')
        ),
        array(
            'name' => 'besaran',
            'type' => 'raw',
            'value' => $model->besaran . ' %'
        ),
    ),
));
?>
