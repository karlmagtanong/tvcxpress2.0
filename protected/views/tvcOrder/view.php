<?php
/* @var $this TvcOrderController */
/* @var $model TvcOrder */

$this->breadcrumbs=array(
	'Tvc Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TvcOrder', 'url'=>array('index')),
	array('label'=>'Create TvcOrder', 'url'=>array('create')),
	array('label'=>'Update TvcOrder', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TvcOrder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TvcOrder', 'url'=>array('admin')),
);
?>

<h1>View TvcOrder #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_id',
		'order_code',
		'advertiser',
		'asc_brand',
		'product_category',
		'asc_project_title',
		'length',
		'break_date',
		'break_time_hh',
		'break_time_mm',
		'break_time_aa',
		'producer',
		'producer_contact',
		'producer_email',
		'agency_company',
		'agency_contact_person',
		'agency_contact_no',
		'agency_email',
		'billing_ce',
		'billing_company',
		'billing_address',
		'billing_contact_person',
		'billing_contact_no',
		'billing_contact_email',
		'billing_tin',
		'billing_business_type',
		'payment_terms',
		'currency',
		'mode_payment',
		'gcash_name',
		'gcash_email',
		'gcash_number',
		'service_type',
		'platform',
		'delivery_method',
		'delivery_company',
		'delivery_contact_name',
		'delivery_number',
		'delivery_email',
		'share_type',
		'share_link',
		'share_date',
		'share_time_hh',
		'share_time_mm',
		'share_aa',
		'asc_upload',
		'asc_date',
		'asc_time_hh',
		'asc_time_mm',
		'asc_time_aa',
		'asc_reference_code',
		'asc_valid_from',
		'asc_valid_to',
		'type',
		'created_by',
		'created_at',
	),
)); ?>
