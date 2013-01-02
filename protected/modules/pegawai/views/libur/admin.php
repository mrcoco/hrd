<?php
/* @var $this LiburController */
/* @var $model Libur */

$this->breadcrumbs = array(
    'Libur' => array('admin'),
    'Kelola Libur',
);

$this->menu = array(
    array('label' => 'Buat Libur', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('libur-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Libur</h1>

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
    'id' => 'libur-grid',
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
        'tanggal',
        'nama',
        array(
            'name' => 'recuring',
            'filter' => $model->getRecuringOptions(),
            'value' => '$data->getRecuringText()',
            'type' => 'raw',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
