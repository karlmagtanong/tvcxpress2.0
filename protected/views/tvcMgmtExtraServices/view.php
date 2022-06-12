<?php
/* @var $this TvcMgmtExtraServicesController */
/* @var $model TvcMgmtExtraServices */

$this->breadcrumbs=array(
	'Tvc Mgmt Extra Services'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TvcMgmtExtraServices', 'url'=>array('index')),
	array('label'=>'Create TvcMgmtExtraServices', 'url'=>array('create')),
	array('label'=>'Update TvcMgmtExtraServices', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TvcMgmtExtraServices', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TvcMgmtExtraServices', 'url'=>array('admin')),
);
?>

<h1>View TvcMgmtExtraServices #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'sub_category',
		'price',
		'type',
	),
)); ?>
