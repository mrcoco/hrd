<?php
/* @var $this TunjanganController */
/* @var $model Tunjangan */

$this->breadcrumbs = array(
    'Tunjangan' => array('admin'),
    'Kelola Tunjangan',
);

$this->menu = array(
    array('label' => 'Buat Tunjangan', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tunjangan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Tunjangan</h1>

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
    'id' => 'tunjangan-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'htmlOptions' => array(
                'valign' => 'top',
                'width' => '2px'
            )
        ),
        'nama',
        'keterangan',
        /* 'created',
          'updated', */
        array(
            'header' => 'Tipe Tunjangan',
            'name' => 'tipe_tunjangan_id',
            'value' => '$data->tipeTunjangan->nama',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
