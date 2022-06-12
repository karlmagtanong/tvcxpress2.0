<?php
/* @var $this TvcMgmtAscBrandController */
/* @var $model TvcMgmtAscBrand */

$this->breadcrumbs=array(
	'Tvc Mgmt Asc Brands'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TvcMgmtAscBrand', 'url'=>array('index')),
	array('label'=>'Create TvcMgmtAscBrand', 'url'=>array('create')),
	array('label'=>'Update TvcMgmtAscBrand', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TvcMgmtAscBrand', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TvcMgmtAscBrand', 'url'=>array('admin')),
);
?>

<h1>View TvcMgmtAscBrand #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
