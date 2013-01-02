<?php
/* @var $this LemburController */
/* @var $model Lembur */

$this->breadcrumbs = array(
    $model->pegawai->nama => array('pegawai/view/id/' . $model->pegawai->id),
    'Kelola Lembur',
);

$this->menu = array(
    array('label' => 'Buat Lembur', 'url' => array('create', 'pid' => $model->pegawai->id)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('lembur-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Lembur</h1>


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
    'id' => 'lembur-grid',
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
        'lama',
        'biaya',
        'tanggal',
        /* 'created',
          'updated', */
        array(
            'header' => 'Pegawai',
            'name' => 'pegawai_id',
            'value' => '$data->pegawai->nama',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
