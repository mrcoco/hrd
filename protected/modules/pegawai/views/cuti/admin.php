<?php
/* @var $this CutiController */
/* @var $model Cuti */

$this->breadcrumbs=array(
	'Cuti'=>array('admin'),
	'Kelola Cuti',
);

$this->menu=array(
	array('label'=>'Buat Cuti', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cuti-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Cuti</h1>

<?php echo CHtml::link('Pencarian Lanjut','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cuti-grid',
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
		'jatah',
		//'created',
		//'updated',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
