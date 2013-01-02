<?php
Yii::app()->clientScript->registerScript('add', "
$('.add-button').click(function(){
	$('.add-form').toggle();
	return false;
});
");
?>
<div id="pendidikans">
    <?php if (Yii::app()->user->hasFlash('pendidikanSubmitted')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('pendidikanSubmitted'); ?>
        </div>
    <?php endif; ?>
    <h2>Buat Pendidikan</h2>
    <?php echo CHtml::link('Add Pendidikan', '#', array('class' => 'add-button')); ?>
    <div class="add-form" style="display:none">
        <?php
        $this->renderPartial('/pendidikan/_form', array(
            'model' => $pendidikan,
        ));
        ?>
    </div>
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'pendidikans-grid',
        'enableSorting' => false,
        'dataProvider' => new CArrayDataProvider($pendidikans, array(
            'pagination' => array(
                'pageSize' => 5,
            ),
            'sort' => array(
                'defaultOrder' => 'tahun DESC',
            ),
        )),
        'columns' => array(
//            'id',
            'lembaga',
            'jenjang',
            'tahun',
//            'created',
//            'updated',
            array(
                'class' => 'CButtonColumn',
                'template' => '{email}{delete}',
                'deleteButtonUrl' => 'Yii::app()->createUrl("//pegawai/pendidikan/delete", array("id" => $data[\'id\']))',
                'buttons' => array(
                    'email' => array(
                        'label' => Yii::app()->request->baseUrl . Yii::app()->params['uploads'] . '$data[\'file_name\']',
                        'imageUrl' => Yii::app()->request->baseUrl . '/images/small_icons/image.png',
                        'url' => 'Yii::app()->request->baseUrl . Yii::app()->params[\'uploads\'] .$data->file_name',
                    ),
                ),
            ),
        ),
    ));
    ?>
</div>