
<div class="row">
    <?php echo $form->labelEx($pegawai, 'file'); ?>
    <?php echo $form->fileField($pegawai, 'file', array()); ?>
    <?php echo $form->error($pegawai, 'file'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($pegawai, 'jabatan_id'); ?>
    <?php echo $form->dropDownList($pegawai, 'jabatan_id', $pegawai->getJabatanOptions()); ?>
    <?php echo $form->error($pegawai, 'jabatan_id'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($pegawai, 'nik'); ?>
    <?php echo $form->textField($pegawai, 'nik', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($pegawai, 'nik'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($pegawai, 'nama'); ?>
    <?php echo $form->textField($pegawai, 'nama', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($pegawai, 'nama'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($pegawai, 'alamat'); ?>
    <?php echo $form->textArea($pegawai, 'alamat', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->error($pegawai, 'alamat'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($pegawai, 'jenis_kelamin'); ?>
    <?php echo $form->radioButtonList($pegawai, 'jenis_kelamin', $pegawai->getJenisKelaminOptions(), array('template' => '{input}{label}', 'separator' => '')); ?>
    <?php echo $form->error($pegawai, 'alamat'); ?>
</div>