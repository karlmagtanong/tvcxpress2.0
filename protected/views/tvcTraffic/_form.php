<?php
/* @var $this TvcTrafficController */
/* @var $model TvcTraffic */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tvc-traffic-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_code'); ?>
		<?php echo $form->textField($model,'order_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'order_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sched'); ?>
		<?php echo $form->textField($model,'sched'); ?>
		<?php echo $form->error($model,'sched'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_form'); ?>
		<?php echo $form->textField($model,'order_form'); ?>
		<?php echo $form->error($model,'order_form'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'material'); ?>
		<?php echo $form->textField($model,'material'); ?>
		<?php echo $form->error($model,'material'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asc_clearance'); ?>
		<?php echo $form->textField($model,'asc_clearance'); ?>
		<?php echo $form->error($model,'asc_clearance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'billing'); ?>
		<?php echo $form->textField($model,'billing'); ?>
		<?php echo $form->error($model,'billing'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->