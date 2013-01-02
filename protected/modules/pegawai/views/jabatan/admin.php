<?php
/* @var $this JabatanController */
/* @var $model Jabatan */

$this->breadcrumbs = array(
    'Jabatan' => array('admin'),
    'Kelola Jabatan',
);

$this->menu = array(
    array('label' => 'Buat Jabatan', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('jabatan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Jabatan</h1>

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
    'id' => 'jabatan-grid',
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
        'gaji',
        /* 'created',
          'updated', */
        array(
            'header' => 'Tingkat Jabatan',
            'name' => 'jabatan_id',
            'type' => 'raw',
            'value' => '($data->jabatan === null) ? \'\' : $data->jabatan->nama',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
