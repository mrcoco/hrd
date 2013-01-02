<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'pajak-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'nama'); ?>
        <?php echo $form->textField($model, 'nama', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'nama'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'min_gaji'); ?>
        <?php echo $form->textField($model, 'min_gaji'); ?>
        <?php echo $form->error($model, 'min_gaji'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'max_gaji'); ?>
        <?php echo $form->textField($model, 'max_gaji'); ?>
        <?php echo $form->error($model, 'max_gaji'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'besaran'); ?>
        <?php echo $form->textField($model, 'besaran'); ?>
        <?php echo $form->error($model, 'besaran'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->