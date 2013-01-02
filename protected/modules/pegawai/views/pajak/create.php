<?php
$this->breadcrumbs = array(
    'Pajaks' => array('admin'),
    'Buat',
);

$this->menu = array(
    array('label' => 'Kelola Pajak', 'url' => array('admin')),
);
?>

<h1>Buat Pajak</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>