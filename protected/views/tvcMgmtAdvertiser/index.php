<?php
/* @var $this TvcMgmtAdvertiserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tvc Mgmt Advertisers',
);

$this->menu=array(
	array('label'=>'Create TvcMgmtAdvertiser', 'url'=>array('create')),
	array('label'=>'Manage TvcMgmtAdvertiser', 'url'=>array('admin')),
);
?>

<h1>Tvc Mgmt Advertisers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
