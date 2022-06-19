<?php
/* @var $this TvcTrafficController */
/* @var $data TvcTraffic */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_code')); ?>:</b>
	<?php echo CHtml::encode($data->order_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sched')); ?>:</b>
	<?php echo CHtml::encode($data->sched); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_form')); ?>:</b>
	<?php echo CHtml::encode($data->order_form); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('material')); ?>:</b>
	<?php echo CHtml::encode($data->material); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asc_clearance')); ?>:</b>
	<?php echo CHtml::encode($data->asc_clearance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing')); ?>:</b>
	<?php echo CHtml::encode($data->billing); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	*/ ?>

</div>