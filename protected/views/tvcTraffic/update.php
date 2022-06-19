<?php
/* @var $this TvcTrafficController */
/* @var $model TvcTraffic */

$this->breadcrumbs=array(
	'Tvc Traffics'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TvcTraffic', 'url'=>array('index')),
	array('label'=>'Create TvcTraffic', 'url'=>array('create')),
	array('label'=>'View TvcTraffic', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TvcTraffic', 'url'=>array('admin')),
);
?>

<h1>Update TvcTraffic <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>