<?php
/* @var $this TvcMgmtExtraServicesSubController */
/* @var $model TvcMgmtExtraServicesSub */

$this->breadcrumbs=array(
	'Tvc Mgmt Extra Services Subs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TvcMgmtExtraServicesSub', 'url'=>array('index')),
	array('label'=>'Create TvcMgmtExtraServicesSub', 'url'=>array('create')),
	array('label'=>'Update TvcMgmtExtraServicesSub', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TvcMgmtExtraServicesSub', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TvcMgmtExtraServicesSub', 'url'=>array('admin')),
);
?>

<h1>View TvcMgmtExtraServicesSub #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'serv_id',
		'sub_category',
		'price',
	),
)); ?>
