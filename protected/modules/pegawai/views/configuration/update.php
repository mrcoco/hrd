<?php
$this->breadcrumbs = array(
    'Configurations' => array('admin'),
    $model->id => array('view', 'id' => $model->id),
    'Sunting',
);

$this->menu = array(
    array('label' => 'Buat Configuration', 'url' => array('create')),
    array('label' => 'Lihat Configuration', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Kelola Configuration', 'url' => array('admin')),
);
?>

<h1>Sunting Configuration <?php echo $model->key; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>