<?php
/* @var $this GajiController */
/* @var $model Gaji */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jumlah_gaji'); ?>
		<?php echo $form->textField($model,'jumlah_gaji'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jumlah_tunjangan'); ?>
		<?php echo $form->textField($model,'jumlah_tunjangan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jumlah_pajak'); ?>
		<?php echo $form->textField($model,'jumlah_pajak'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jumlah_lembur'); ?>
		<?php echo $form->textField($model,'jumlah_lembur'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jumlah_bonus'); ?>
		<?php echo $form->textField($model,'jumlah_bonus'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_gaji_bersih'); ?>
		<?php echo $form->textField($model,'total_gaji_bersih'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated'); ?>
		<?php echo $form->textField($model,'updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pegawai_id'); ?>
		<?php echo $form->textField($model,'pegawai_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->