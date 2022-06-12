<?php
/* @var $this TvcMgmtChannelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tvc Mgmt Channels',
);

$this->menu=array(
	array('label'=>'Create TvcMgmtChannel', 'url'=>array('create')),
	array('label'=>'Manage TvcMgmtChannel', 'url'=>array('admin')),
);
?>

<h1>Tvc Mgmt Channels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
