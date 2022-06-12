<?php
/* @var $this TvcMgmtExtraServicesSubController */
/* @var $data TvcMgmtExtraServicesSub */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serv_id')); ?>:</b>
	<?php echo CHtml::encode($data->serv_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_category')); ?>:</b>
	<?php echo CHtml::encode($data->sub_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />


</div>