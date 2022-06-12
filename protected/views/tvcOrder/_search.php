<?php
/* @var $this TvcOrderController */
/* @var $model TvcOrder */
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
		<?php echo $form->label($model,'order_id'); ?>
		<?php echo $form->textField($model,'order_id',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_code'); ?>
		<?php echo $form->textField($model,'order_code',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advertiser'); ?>
		<?php echo $form->textField($model,'advertiser',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asc_brand'); ?>
		<?php echo $form->textField($model,'asc_brand',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_category'); ?>
		<?php echo $form->textField($model,'product_category',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asc_project_title'); ?>
		<?php echo $form->textField($model,'asc_project_title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'length'); ?>
		<?php echo $form->textField($model,'length',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'break_date'); ?>
		<?php echo $form->textField($model,'break_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'break_time_hh'); ?>
		<?php echo $form->textField($model,'break_time_hh'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'break_time_mm'); ?>
		<?php echo $form->textField($model,'break_time_mm'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'break_time_aa'); ?>
		<?php echo $form->textField($model,'break_time_aa',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'producer'); ?>
		<?php echo $form->textField($model,'producer',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'producer_contact'); ?>
		<?php echo $form->textField($model,'producer_contact',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'producer_email'); ?>
		<?php echo $form->textField($model,'producer_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'agency_company'); ?>
		<?php echo $form->textField($model,'agency_company',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'agency_contact_person'); ?>
		<?php echo $form->textField($model,'agency_contact_person',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'agency_contact_no'); ?>
		<?php echo $form->textField($model,'agency_contact_no',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'agency_email'); ?>
		<?php echo $form->textField($model,'agency_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'billing_ce'); ?>
		<?php echo $form->textField($model,'billing_ce',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'billing_company'); ?>
		<?php echo $form->textField($model,'billing_company',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'billing_address'); ?>
		<?php echo $form->textField($model,'billing_address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'billing_contact_person'); ?>
		<?php echo $form->textField($model,'billing_contact_person',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'billing_contact_no'); ?>
		<?php echo $form->textField($model,'billing_contact_no',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'billing_contact_email'); ?>
		<?php echo $form->textField($model,'billing_contact_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'billing_tin'); ?>
		<?php echo $form->textField($model,'billing_tin',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'billing_business_type'); ?>
		<?php echo $form->textField($model,'billing_business_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_terms'); ?>
		<?php echo $form->textField($model,'payment_terms'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency'); ?>
		<?php echo $form->textField($model,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mode_payment'); ?>
		<?php echo $form->textField($model,'mode_payment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gcash_name'); ?>
		<?php echo $form->textField($model,'gcash_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gcash_email'); ?>
		<?php echo $form->textField($model,'gcash_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gcash_number'); ?>
		<?php echo $form->textField($model,'gcash_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service_type'); ?>
		<?php echo $form->textField($model,'service_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'platform'); ?>
		<?php echo $form->textField($model,'platform'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_method'); ?>
		<?php echo $form->textField($model,'delivery_method'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_company'); ?>
		<?php echo $form->textField($model,'delivery_company',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_contact_name'); ?>
		<?php echo $form->textField($model,'delivery_contact_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_number'); ?>
		<?php echo $form->textField($model,'delivery_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_email'); ?>
		<?php echo $form->textField($model,'delivery_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'share_type'); ?>
		<?php echo $form->textField($model,'share_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'share_link'); ?>
		<?php echo $form->textField($model,'share_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'share_date'); ?>
		<?php echo $form->textField($model,'share_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'share_time_hh'); ?>
		<?php echo $form->textField($model,'share_time_hh'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'share_time_mm'); ?>
		<?php echo $form->textField($model,'share_time_mm'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'share_aa'); ?>
		<?php echo $form->textField($model,'share_aa',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asc_upload'); ?>
		<?php echo $form->textField($model,'asc_upload'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asc_date'); ?>
		<?php echo $form->textField($model,'asc_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asc_time_hh'); ?>
		<?php echo $form->textField($model,'asc_time_hh'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asc_time_mm'); ?>
		<?php echo $form->textField($model,'asc_time_mm'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asc_time_aa'); ?>
		<?php echo $form->textField($model,'asc_time_aa',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asc_reference_code'); ?>
		<?php echo $form->textField($model,'asc_reference_code',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asc_valid_from'); ?>
		<?php echo $form->textField($model,'asc_valid_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asc_valid_to'); ?>
		<?php echo $form->textField($model,'asc_valid_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->