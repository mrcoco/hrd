<?php
/* @var $this PendidikanController */
/* @var $model Pendidikan */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'pendidikan-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'lembaga'); ?>
        <?php echo $form->textField($model, 'lembaga', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'lembaga'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'jenjang'); ?>
        <?php echo $form->textField($model, 'jenjang', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'jenjang'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tahun'); ?>
        <?php echo $form->textField($model, 'tahun', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'tahun'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'file'); ?>
        <?php echo $form->fileField($model, 'file', array()); ?>
        <?php echo $form->error($model, 'file'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->