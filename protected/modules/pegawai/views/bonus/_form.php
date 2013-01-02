<?php
/* @var $this BonusController */
/* @var $model Bonus */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'bonus-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

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
        <?php echo $form->labelEx($model, 'nama'); ?>
        <?php echo $form->textField($model, 'nama', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'nama'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'besar'); ?>
        <?php echo $form->textField($model, 'besar'); ?>
        <?php echo $form->error($model, 'besar'); ?>
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