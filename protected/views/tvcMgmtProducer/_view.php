<?php
/* @var $this TvcMgmtProducerController */
/* @var $data TvcMgmtProducer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('int')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->int), array('view', 'id'=>$data->int)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_number')); ?>:</b>
	<?php echo CHtml::encode($data->contact_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />


</div>