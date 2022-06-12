<?php
/* @var $this TvcMgmtExtraServicesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tvc Mgmt Extra Services',
);

$this->menu=array(
	array('label'=>'Create TvcMgmtExtraServices', 'url'=>array('create')),
	array('label'=>'Manage TvcMgmtExtraServices', 'url'=>array('admin')),
);
?>

<h1>Tvc Mgmt Extra Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
