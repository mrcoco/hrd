<?php
/* @var $this GajiController */
/* @var $model Gaji */

$this->breadcrumbs = array(
    'Gaji' => array('admin', 'pid' => $model->pegawai->id),
    'Kelola Gaji',
);

$this->menu = array(
    array('label' => 'Buat Gaji', 'url' => array('create', 'pid' => $model->pegawai->id)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gaji-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Gaji</h1>

<?php echo CHtml::link('Pencarian Lanjut', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'gaji-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'jumlah_gaji',
        'jumlah_tunjangan',
        'jumlah_pajak',
        'jumlah_lembur',
        'jumlah_bonus',
        'total_gaji_bersih',
        'date',
        /* 'created',
          'updated',
          'pegawai_id',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
