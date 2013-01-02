<?php
/* @var $this JabatanController */
/* @var $model Jabatan */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'jabatan-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'jabatan_id'); ?>
        <?php echo $form->dropDownlist($model, 'jabatan_id', CHtml::listData(Jabatan::model()->findAll(), 'id', 'nama'), array('empty' => '')) ?>
        <?php echo $form->error($model, 'jabatan_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nama'); ?>
        <?php echo $form->textField($model, 'nama', array('size' => 30, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'nama'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'gaji'); ?>
        <?php echo $form->textField($model, 'gaji'); ?>
        <?php echo $form->error($model, 'gaji'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->