<?php
/* @var $this TvcMgmtExtraServicesSubController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tvc Mgmt Extra Services Subs',
);

$this->menu=array(
	array('label'=>'Create TvcMgmtExtraServicesSub', 'url'=>array('create')),
	array('label'=>'Manage TvcMgmtExtraServicesSub', 'url'=>array('admin')),
);
?>

<h1>Tvc Mgmt Extra Services Subs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
