<?php
$this->breadcrumbs = array(
    'Pajaks' => array('admin'),
    $model->nama => array('view', 'id' => $model->id),
    'Sunting',
);

$this->menu = array(
    array('label' => 'Buat Pajak', 'url' => array('create')),
    array('label' => 'Lihat Pajak', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Kelola Pajak', 'url' => array('admin')),
);
?>

<h1>Sunting Pajak <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>