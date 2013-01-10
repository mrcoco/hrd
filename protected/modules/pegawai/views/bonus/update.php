<?php
/* @var $this BonusController */
/* @var $model Bonus */

$this->breadcrumbs = array(
    'Bonuses' => array('admin', 'pid' => $model->pegawai->id),
    $model->pegawai->nama => array('pegawai/view/id/' . $model->pegawai->id),
    $model->nama => array('view', 'id' => $model->id),
    'Sunting',
);

$this->menu = array(
    array('label' => 'Buat Bonus', 'url' => array('create', 'pid' => $model->pegawai->id)),
    array('label' => 'Lihat Bonus', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Kelola Bonus', 'url' => array('admin', 'pid' => $model->pegawai->id)),
);
?>

<h1>Sunting Bonus <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>