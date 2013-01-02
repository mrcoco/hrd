<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'pegawai-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary(array($model, $keluarga, $user)); ?>

    <?php
    $this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs' => array(
            'Pegawai' => $this->renderPartial('_fpegawai', array('pegawai' => $model, 'form' => $form), true),
            'User' => $this->renderPartial('_fuser', array('user' => $user, 'form' => $form), true),
            'keluarga' => $this->renderPartial('_fkeluarga', array('keluarga' => $keluarga, 'form' => $form), true),
//            'keluarga' => $this->renderPartial('_pendidikan', array('model' => $model->keluarga), true),
        ),
        'options' => array(
            'collapsible' => false,
        ),
        'htmlOptions' => array('class' => 'shadowtabs'),
    ));
    ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton($user->isNewRecord ? 'Buat' : 'Simpan'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->