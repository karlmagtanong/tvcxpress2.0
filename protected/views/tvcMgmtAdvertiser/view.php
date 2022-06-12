<?php
/* @var $this TvcMgmtAdvertiserController */
/* @var $model TvcMgmtAdvertiser */

$this->breadcrumbs=array(
	'Tvc Mgmt Advertisers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TvcMgmtAdvertiser', 'url'=>array('index')),
	array('label'=>'Create TvcMgmtAdvertiser', 'url'=>array('create')),
	array('label'=>'Update TvcMgmtAdvertiser', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TvcMgmtAdvertiser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TvcMgmtAdvertiser', 'url'=>array('admin')),
);
?>

<h1>View TvcMgmtAdvertiser #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
