<?php
/* @var $this LemburController */
/* @var $model Lembur */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'lembur-form',
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
            'htmlOptions' => array(
                'class' => 'shadowdatepicker'
            ),
        ));
        ?>
        <?php echo $form->error($model, 'tanggal'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'lama'); ?>
        <?php echo $form->textField($model, 'lama'); ?>
        <?php echo $form->error($model, 'lama'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->