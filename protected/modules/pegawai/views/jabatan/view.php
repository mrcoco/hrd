<?php
/* @var $this JabatanController */
/* @var $model Jabatan */

$this->breadcrumbs = array(
    'Jabatan' => array('admin'),
    $model->nama,
);

$this->menu = array(
    array('label' => 'Buat Jabatan', 'url' => array('create')),
    array('label' => 'Perbarui Jabatan', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Hapus Jabatan', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Kelola Jabatan', 'url' => array('admin')),
);
?>

<h1>Lihat Jabatan</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'jabatan.nama',
        'nama',
        array(
            'name' => 'gaji',
            'type' => 'raw',
            'value' => 'Rp. ' . number_format($model->gaji, 2, ',', '.')
        ),
    ),
));
?>
<?php
Yii::app()->clientScript->registerScript('add', "
$('.add-button').click(function(){
	$('.add-form').toggle();
	return false;
});
");
?>
<div id="tunjanganJabatans">
    <h2>Daftar TunjanganJabatan</h2>
    <?php echo CHtml::link('Add TunjanganJabatan', '#', array('class' => 'add-button')); ?>
    <?php if (Yii::app()->user->hasFlash('tunjanganJabatanSubmitted')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('tunjanganJabatanSubmitted'); ?>
        </div>
    <?php endif; ?>
    <div class="add-form" style="display:none">
        <?php
        $this->renderPartial('/tunjanganJabatan/_form', array(
            'model' => $tunjanganJabatan,
        ));
        ?>
    </div>
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'tunjanganJabatans-grid',
        'enableSorting' => false,
        'dataProvider' => new CArrayDataProvider($model->tunjanganJabatans, array(
            'pagination' => array(
                'pageSize' => 5,
            ),
            'sort' => array(
                'defaultOrder' => 'nilai DESC',
            ),
        )),
        'columns' => array(
            array(
                'header' => 'No',
                'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                'htmlOptions' => array(
                    'valign' => 'top',
                    'width' => '2px'
                )
            ),
            array(
                'header' => 'Tunjangan',
                'name' => 'tunjangan_id',
                'value' => '$data->tunjangan->nama',
                'type' => 'raw',
            ),
            array(
                'header' => 'Nilai',
                'name' => 'nilai',
                'value' => '\'Rp. \' . number_format($data->nilai, 2, \',\', \'.\')',
                'type' => 'raw',
            ),
            array(
                'class' => 'CButtonColumn',
                'template' => '{delete}',
                'deleteButtonUrl' => 'Yii::app()->createUrl("//pegawai/tunjanganJabatan/delete", array("id" => $data[\'id\']))',
            ),
        ),
    ));
    ?>
</div>