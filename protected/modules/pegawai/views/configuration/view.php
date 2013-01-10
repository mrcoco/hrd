<?php
$this->breadcrumbs = array(
    'Configurations' => array('admin'),
    $model->key,
);

$this->menu = array(
    array('label' => 'Buat Configuration', 'url' => array('create')),
    array('label' => 'Sunting Configuration', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Hapus Configuration', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Kelola Configuration', 'url' => array('admin')),
);
?>

<h1>Lihat Configuration <?php echo $model->key; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'key',
        'value',
    ),
));
?>
