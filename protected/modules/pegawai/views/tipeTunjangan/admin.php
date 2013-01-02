<?php
/* @var $this TipeTunjanganController */
/* @var $model TipeTunjangan */

$this->breadcrumbs=array(
	'Tipe Tunjangan'=>array('admin'),
	'Kelola Tipe Tunjangan',
);

$this->menu=array(
	array('label'=>'Buat Tipe Tunjangan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tipe-tunjangan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Tipe Tunjangan</h1>

<?php echo CHtml::link('Pencarian Lanjut','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tipe-tunjangan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
	    	'header'=>'No',
        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
			'htmlOptions'=>array(
			'valign'=>'top',
			'width'=>'2px'
			)
        ),
		'nama',
		'keterangan',
		/*'created',
		'updated',*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
