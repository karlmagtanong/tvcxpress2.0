<?php
/* @var $this TvcTrafficController */
/* @var $model TvcTraffic */

$this->breadcrumbs=array(
	'Tvc Traffics'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TvcTraffic', 'url'=>array('index')),
	array('label'=>'Create TvcTraffic', 'url'=>array('create')),
	array('label'=>'Update TvcTraffic', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TvcTraffic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TvcTraffic', 'url'=>array('admin')),
);
?>

<h1>View TvcTraffic #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_code',
		'sched',
		'order_form',
		'material',
		'asc_clearance',
		'billing',
		'status',
		'created_by',
		'created_at',
	),
)); ?>
