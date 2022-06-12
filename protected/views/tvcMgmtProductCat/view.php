<?php
/* @var $this TvcMgmtProductCatController */
/* @var $model TvcMgmtProductCat */

$this->breadcrumbs=array(
	'Tvc Mgmt Product Cats'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TvcMgmtProductCat', 'url'=>array('index')),
	array('label'=>'Create TvcMgmtProductCat', 'url'=>array('create')),
	array('label'=>'Update TvcMgmtProductCat', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TvcMgmtProductCat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TvcMgmtProductCat', 'url'=>array('admin')),
);
?>

<h1>View TvcMgmtProductCat #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
