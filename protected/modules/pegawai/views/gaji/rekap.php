<h1>Rekap Gaji  </h1>

<?php if (Yii::app()->user->hasFlash('gajiDownloadError')): ?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('gajiDownloadError'); ?>
    </div>
<?php endif; ?>
<div class="form">
    <?php echo CHtml::beginForm(); ?>
    <div class="row">
        <?php echo CHtml::label('Pilih Pegawai', ' pegawai_id'); ?>
        <?php echo CHtml::dropDownList('pegawai_id', $pegawai_id, Gaji::model()->getPegawaiOptions()); ?>
    </div> 
    <div class="row">
        <?php echo CHtml::label('Pilih Bulan', ' bulan'); ?>
        <?php echo CHtml::dropDownList('bulan', $bulan, Gaji::model()->getMonthOptions()); ?>
    </div> 

    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>
    <?php echo CHtml::endForm(); ?>
</div><!-- form -->