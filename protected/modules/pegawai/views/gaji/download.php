<h1>Download Slip Gaji</h1>

<?php if (Yii::app()->user->hasFlash('gajiDownloadError')): ?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('gajiDownloadError'); ?>
    </div>
<?php endif; ?>
<div class="form">
    <?php echo CHtml::beginForm(); ?>
    <div class="row">
        <?php echo CHtml::label('Pilih Tahun', ' tahun'); ?>
        <?php echo CHtml::dropDownList('tahun', $tahun, Gaji::model()->getYearOptions()); ?>
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