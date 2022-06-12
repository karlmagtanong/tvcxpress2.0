<?php
/* @var $this TvcMgmtProducerController */
/* @var $model TvcMgmtProducer */

$this->breadcrumbs=array(
	'Tvc Mgmt Producers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TvcMgmtProducer', 'url'=>array('index')),
	array('label'=>'Create TvcMgmtProducer', 'url'=>array('create')),
	array('label'=>'Update TvcMgmtProducer', 'url'=>array('update', 'id'=>$model->int)),
	array('label'=>'Delete TvcMgmtProducer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->int),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TvcMgmtProducer', 'url'=>array('admin')),
);
?>

<h1>View TvcMgmtProducer #<?php echo $model->int; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'int',
		'name',
		'contact_number',
		'email',
	),
)); ?>
