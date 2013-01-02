<?php
$this->breadcrumbs = array(
    'Pajaks' => array('admin'),
    'Kelola',
);

$this->menu = array(
    array('label' => 'Buat Pajak', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pajak-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Pajaks</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'pajak-grid',
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
        array(
            'name' => 'min_gaji',
            'value' => '\'Rp. \' . number_format($data->min_gaji, 0, \',\', \'.\')',
            'type' => 'raw',
        ),
        array(
            'name' => 'max_gaji',
            'value' => '\'Rp. \' . number_format($data->max_gaji, 0, \',\', \'.\')',
            'type' => 'raw',
        ),
        array(
            'name' => 'besaran',
            'value' => '$data->besaran . \' %\'',
            'type' => 'raw',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
