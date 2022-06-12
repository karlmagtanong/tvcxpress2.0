<?php
/* @var $this TvcMgmtExtraServicesSubController */
/* @var $model TvcMgmtExtraServicesSub */
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
		<?php echo $form->label($model,'serv_id'); ?>
		<?php echo $form->textField($model,'serv_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sub_category'); ?>
		<?php echo $form->textField($model,'sub_category',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->