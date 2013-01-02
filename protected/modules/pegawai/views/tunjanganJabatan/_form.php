<?php
/* @var $this TunjanganJabatanController */
/* @var $model TunjanganJabatan */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tunjangan-jabatan-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'tunjangan_id'); ?>
        <?php echo $form->dropDownlist($model, 'tunjangan_id', CHtml::listData(Tunjangan::model()->findAll(), 'id', 'nama')) ?>
        <?php echo $form->error($model, 'tunjangan_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nilai'); ?>
        <?php echo $form->textField($model, 'nilai'); ?>
        <?php echo $form->error($model, 'nilai'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->