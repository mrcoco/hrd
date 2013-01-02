<?php
/* @var $this TunjanganJabatanController */
/* @var $model TunjanganJabatan */

$this->breadcrumbs=array(
	'Tunjangan Jabatan'=>array('admin'),
	'Kelola Tunjangan Jabatan',
);

$this->menu=array(
	array('label'=>'Buat Tunjangan Jabatan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tunjangan-jabatan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Tunjangan Jabatan</h1>

<?php echo CHtml::link('Pencarian Lanjut','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tunjangan-jabatan-grid',
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
		'nilai',
		/*'created',
		'updated',*/
		array(
			'header'=>'Jabatan',
			'name'=>'jabatan_id',
			'value'=>'$data->jabatan->nama',
		),
		array(
			'header'=>'Tunjangan',
			'name'=>'tunjangan_id',
			'value'=>'$data->tunjangan->nama',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
