<?php
/* @var $this BonusController */
/* @var $model Bonus */

$this->breadcrumbs = array(
    'Bonuses' => array('admin', 'pid' => $model->pegawai->id),
    $model->pegawai->nama => array('pegawai/view/id/' . $model->pegawai->id),
    'Buat',
);

$this->menu = array(
    array('label' => 'Kelola Bonus', 'url' => array('admin', 'pid' => $model->pegawai->id)),
);
?>

<h1>Buat Bonus</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>