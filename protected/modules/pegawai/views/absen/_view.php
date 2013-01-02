<?php
/* @var $this AbsenController */
/* @var $model Absen */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jam_masuk')); ?>:</b>
	<?php echo CHtml::encode($data->jam_masuk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jam_keluar')); ?>:</b>
	<?php echo CHtml::encode($data->jam_keluar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_present')); ?>:</b>
	<?php echo CHtml::encode($data->is_present); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pegawai_id')); ?>:</b>
	<?php echo CHtml::encode($data->pegawai_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cuti_id')); ?>:</b>
	<?php echo CHtml::encode($data->cuti_id); ?>
	<br />

	*/ ?>

</div>