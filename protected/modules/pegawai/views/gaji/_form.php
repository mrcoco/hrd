<?php
/* @var $this GajiController */
/* @var $model Gaji */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'gaji-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'jumlah_gaji'); ?>
        <?php echo $form->textField($model, 'jumlah_gaji'); ?>
        <?php echo $form->error($model, 'jumlah_gaji'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'jumlah_tunjangan'); ?>
        <?php echo $form->textField($model, 'jumlah_tunjangan'); ?>
        <?php echo $form->error($model, 'jumlah_tunjangan'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'jumlah_pajak'); ?>
        <?php echo $form->textField($model, 'jumlah_pajak'); ?>
        <?php echo $form->error($model, 'jumlah_pajak'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'jumlah_lembur'); ?>
        <?php echo $form->textField($model, 'jumlah_lembur'); ?>
        <?php echo $form->error($model, 'jumlah_lembur'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'jumlah_bonus'); ?>
        <?php echo $form->textField($model, 'jumlah_bonus'); ?>
        <?php echo $form->error($model, 'jumlah_bonus'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'total_gaji_bersih'); ?>
        <?php echo $form->textField($model, 'total_gaji_bersih'); ?>
        <?php echo $form->error($model, 'total_gaji_bersih'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->