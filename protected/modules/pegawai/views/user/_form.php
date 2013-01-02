<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'activkey'); ?>
        <?php echo $form->textField($model, 'activkey', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'activkey'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'lastvisit'); ?>
        <?php echo $form->textField($model, 'lastvisit'); ?>
        <?php echo $form->error($model, 'lastvisit'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'superuser'); ?>
        <?php echo $form->textField($model, 'superuser'); ?>
        <?php echo $form->error($model, 'superuser'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->textField($model, 'status'); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'created'); ?>
        <?php echo $form->textField($model, 'created'); ?>
        <?php echo $form->error($model, 'created'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'updated'); ?>
        <?php echo $form->textField($model, 'updated'); ?>
        <?php echo $form->error($model, 'updated'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'pegawai_id'); ?>
        <?php echo $form->textField($model, 'pegawai_id'); ?>
        <?php echo $form->error($model, 'pegawai_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->