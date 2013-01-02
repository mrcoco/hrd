<div class="row">
    <?php echo $form->labelEx($keluarga, 'marital_status'); ?>
    <?php echo $form->radioButtonList($keluarga, 'marital_status', $keluarga->getMaritalStatusOptions(), array('template' => '{input}{label}', 'separator' => '&nbsp;')); ?>
    <?php echo $form->error($keluarga, 'marital_status'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($keluarga, 'jumlah_anak'); ?>
    <?php echo $form->textField($keluarga, 'jumlah_anak'); ?>
    <?php echo $form->error($keluarga, 'jumlah_anak'); ?>
</div>