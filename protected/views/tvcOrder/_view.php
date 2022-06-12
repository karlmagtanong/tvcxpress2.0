<?php
/* @var $this TvcOrderController */
/* @var $data TvcOrder */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::encode($data->order_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_code')); ?>:</b>
	<?php echo CHtml::encode($data->order_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('advertiser')); ?>:</b>
	<?php echo CHtml::encode($data->advertiser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asc_brand')); ?>:</b>
	<?php echo CHtml::encode($data->asc_brand); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_category')); ?>:</b>
	<?php echo CHtml::encode($data->product_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asc_project_title')); ?>:</b>
	<?php echo CHtml::encode($data->asc_project_title); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('length')); ?>:</b>
	<?php echo CHtml::encode($data->length); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('break_date')); ?>:</b>
	<?php echo CHtml::encode($data->break_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('break_time_hh')); ?>:</b>
	<?php echo CHtml::encode($data->break_time_hh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('break_time_mm')); ?>:</b>
	<?php echo CHtml::encode($data->break_time_mm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('break_time_aa')); ?>:</b>
	<?php echo CHtml::encode($data->break_time_aa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producer')); ?>:</b>
	<?php echo CHtml::encode($data->producer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producer_contact')); ?>:</b>
	<?php echo CHtml::encode($data->producer_contact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producer_email')); ?>:</b>
	<?php echo CHtml::encode($data->producer_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agency_company')); ?>:</b>
	<?php echo CHtml::encode($data->agency_company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agency_contact_person')); ?>:</b>
	<?php echo CHtml::encode($data->agency_contact_person); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agency_contact_no')); ?>:</b>
	<?php echo CHtml::encode($data->agency_contact_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agency_email')); ?>:</b>
	<?php echo CHtml::encode($data->agency_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_ce')); ?>:</b>
	<?php echo CHtml::encode($data->billing_ce); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_company')); ?>:</b>
	<?php echo CHtml::encode($data->billing_company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_address')); ?>:</b>
	<?php echo CHtml::encode($data->billing_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_contact_person')); ?>:</b>
	<?php echo CHtml::encode($data->billing_contact_person); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_contact_no')); ?>:</b>
	<?php echo CHtml::encode($data->billing_contact_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_contact_email')); ?>:</b>
	<?php echo CHtml::encode($data->billing_contact_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_tin')); ?>:</b>
	<?php echo CHtml::encode($data->billing_tin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_business_type')); ?>:</b>
	<?php echo CHtml::encode($data->billing_business_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_terms')); ?>:</b>
	<?php echo CHtml::encode($data->payment_terms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency')); ?>:</b>
	<?php echo CHtml::encode($data->currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mode_payment')); ?>:</b>
	<?php echo CHtml::encode($data->mode_payment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gcash_name')); ?>:</b>
	<?php echo CHtml::encode($data->gcash_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gcash_email')); ?>:</b>
	<?php echo CHtml::encode($data->gcash_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gcash_number')); ?>:</b>
	<?php echo CHtml::encode($data->gcash_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_type')); ?>:</b>
	<?php echo CHtml::encode($data->service_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('platform')); ?>:</b>
	<?php echo CHtml::encode($data->platform); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_method')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_method); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_company')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_contact_name')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_contact_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_number')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_email')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('share_type')); ?>:</b>
	<?php echo CHtml::encode($data->share_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('share_link')); ?>:</b>
	<?php echo CHtml::encode($data->share_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('share_date')); ?>:</b>
	<?php echo CHtml::encode($data->share_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('share_time_hh')); ?>:</b>
	<?php echo CHtml::encode($data->share_time_hh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('share_time_mm')); ?>:</b>
	<?php echo CHtml::encode($data->share_time_mm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('share_aa')); ?>:</b>
	<?php echo CHtml::encode($data->share_aa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asc_upload')); ?>:</b>
	<?php echo CHtml::encode($data->asc_upload); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asc_date')); ?>:</b>
	<?php echo CHtml::encode($data->asc_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asc_time_hh')); ?>:</b>
	<?php echo CHtml::encode($data->asc_time_hh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asc_time_mm')); ?>:</b>
	<?php echo CHtml::encode($data->asc_time_mm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asc_time_aa')); ?>:</b>
	<?php echo CHtml::encode($data->asc_time_aa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asc_reference_code')); ?>:</b>
	<?php echo CHtml::encode($data->asc_reference_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asc_valid_from')); ?>:</b>
	<?php echo CHtml::encode($data->asc_valid_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asc_valid_to')); ?>:</b>
	<?php echo CHtml::encode($data->asc_valid_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	*/ ?>

</div>