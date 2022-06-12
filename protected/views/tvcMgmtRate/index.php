<?php
/* @var $this TvcMgmtRateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tvc Mgmt Rates',
);

$this->menu=array(
	array('label'=>'Create TvcMgmtRate', 'url'=>array('create')),
	array('label'=>'Manage TvcMgmtRate', 'url'=>array('admin')),
);
?>

<h1>Tvc Mgmt Rates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
