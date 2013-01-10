<?php
$this->breadcrumbs = array(
    'Configurations' => array('admin'),
    'Buat',
);

$this->menu = array(
    array('label' => 'Kelola Configuration', 'url' => array('admin')),
);
?>

<h1>Buat Configuration</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>