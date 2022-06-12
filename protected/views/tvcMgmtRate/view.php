<?php
/* @var $this TvcMgmtRateController */
/* @var $model TvcMgmtRate */

$this->breadcrumbs=array(
	'Tvc Mgmt Rates'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TvcMgmtRate', 'url'=>array('index')),
	array('label'=>'Create TvcMgmtRate', 'url'=>array('create')),
	array('label'=>'Update TvcMgmtRate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TvcMgmtRate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TvcMgmtRate', 'url'=>array('admin')),
);
?>

<h1>View TvcMgmtRate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'length_from',
		'length_to',
		'type',
		'amount',
	),
)); ?>
