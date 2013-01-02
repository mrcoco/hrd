<?php
/* @var $this GajiController */
/* @var $model Gaji */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_gaji')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_gaji); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_tunjangan')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_tunjangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_pajak')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_pajak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_lembur')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_lembur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_bonus')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_bonus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_gaji_bersih')); ?>:</b>
	<?php echo CHtml::encode($data->total_gaji_bersih); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pegawai_id')); ?>:</b>
	<?php echo CHtml::encode($data->pegawai_id); ?>
	<br />

	*/ ?>

</div>