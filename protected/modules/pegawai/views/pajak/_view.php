<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('besaran')); ?>:</b>
	<?php echo CHtml::encode($data->besaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_gaji')); ?>:</b>
	<?php echo CHtml::encode($data->min_gaji); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_gaji')); ?>:</b>
	<?php echo CHtml::encode($data->max_gaji); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />


</div>