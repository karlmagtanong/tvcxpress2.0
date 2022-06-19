<?php
/* @var $this TvcTrafficController */
/* @var $model TvcTraffic */

$this->breadcrumbs=array(
	'Tvc Traffics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TvcTraffic', 'url'=>array('index')),
	array('label'=>'Manage TvcTraffic', 'url'=>array('admin')),
);
?>

<h1>Create TvcTraffic</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>