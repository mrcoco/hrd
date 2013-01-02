<h1>Download Slip Gaji</h1>

<?php if (Yii::app()->user->hasFlash('gajiDownloadError')): ?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('gajiDownloadError'); ?>
    </div>
<?php endif; ?>
<div class="form">
    <?php echo CHtml::beginForm(); ?>
    <div class="row">
        Pilih Bulan
        <?php echo CHtml::dropDownList('bulan', $bulan, Gaji::model()->getMonthOptions()); ?>
        <?php echo CHtml::submitButton('Submit'); ?>
    </div> 
    <?php echo CHtml::endForm(); ?>
</div><!-- form -->