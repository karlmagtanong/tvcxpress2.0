<?php
/* @var $this TvcOrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tvc Orders',
);

$this->menu=array(
	array('label'=>'Create TvcOrder', 'url'=>array('create')),
	array('label'=>'Manage TvcOrder', 'url'=>array('admin')),
);
?>

<h1>Tvc Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
