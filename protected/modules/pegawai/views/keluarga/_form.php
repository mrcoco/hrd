<?php
/* @var $this KeluargaController */
/* @var $model Keluarga */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'keluarga-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'marital_status'); ?>
        <?php echo $form->radioButton($model, 'marital_status', array('value' => 1, 'checked' => true)); ?> Sudah 
        <?php echo $form->radioButton($model, 'marital_status', array('value' => 0)); ?> Belum
        <?php echo $form->error($model, 'marital_status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'jumlah_anak'); ?>
        <?php echo $form->textField($model, 'jumlah_anak'); ?>
        <?php echo $form->error($model, 'jumlah_anak'); ?>
    </div>

<!--    <div class="row">
        <?php // echo $form->labelEx($model, 'pegawai_id'); ?>
        <?php // echo $form->textField($model, 'pegawai_id'); ?>
        <?php // echo $form->error($model, 'pegawai_id'); ?>
    </div>-->

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->