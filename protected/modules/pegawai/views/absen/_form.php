<?php
/* @var $this AbsenController */
/* @var $model Absen */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'absen-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'cuti_id'); ?>
        <?php echo $form->dropDownlist($model, 'cuti_id', CHtml::listData(Cuti::model()->findAll(), 'id', 'nama')) ?>
        <?php echo $form->error($model, 'cuti_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tanggal'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'tanggal',
            'value' => $model->tanggal,
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'showButtonPanel' => true,
                'autoSize' => true,
                'dateFormat' => 'yy-mm-dd',
                'defaultDate' => $model->tanggal,
            ),
        ));
        ?>
        <?php echo $form->error($model, 'tanggal'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'keterangan'); ?>
        <?php echo $form->textArea($model, 'keterangan', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'keterangan'); ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($model, 'jam_masuk'); ?>
        <?php // echo $form->textField($model, 'jam_masuk'); ?>
        <?php // echo $form->error($model, 'jam_masuk'); ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($model, 'jam_keluar'); ?>
        <?php // echo $form->textField($model, 'jam_keluar'); ?>
        <?php // echo $form->error($model, 'jam_keluar'); ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($model, 'is_present'); ?>
        <?php // echo $form->textField($model, 'is_present'); ?>
        <?php // echo $form->error($model, 'is_present'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->