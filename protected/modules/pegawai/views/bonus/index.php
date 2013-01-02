<?php
/* @var $this BonusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Bonuses',
);

$this->menu = array(
    array('label' => 'Buat Bonus', 'url' => array('create', 'pid' => $model->pegawai->id)),
    array('label' => 'Kelola Bonus', 'url' => array('admin', 'pid' => $model->pegawai->id)),
);
?>

<h1>Bonuses</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
