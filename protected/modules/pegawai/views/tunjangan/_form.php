<?php
/* @var $this TunjanganController */
/* @var $model Tunjangan */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tunjangan-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'tipe_tunjangan_id'); ?>
        <?php echo $form->dropDownlist($model, 'tipe_tunjangan_id', CHtml::listData(TipeTunjangan::model()->findAll(), 'id', 'nama')) ?>
        <?php echo $form->error($model, 'tipe_tunjangan_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nama'); ?>
        <?php echo $form->textField($model, 'nama', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'nama'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'keterangan'); ?>
        <?php echo $form->textArea($model, 'keterangan', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'keterangan'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->