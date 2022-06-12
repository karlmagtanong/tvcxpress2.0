<?php
/* @var $this TvcOrderController */
/* @var $model TvcOrder */

$this->breadcrumbs=array(
	'Tvc Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TvcOrder', 'url'=>array('index')),
	array('label'=>'Create TvcOrder', 'url'=>array('create')),
	array('label'=>'View TvcOrder', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TvcOrder', 'url'=>array('admin')),
);
?>

<h1>Update TvcOrder <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>