<?php
/* @var $this TvcMgmtChannelClusterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tvc Mgmt Channel Clusters',
);

$this->menu=array(
	array('label'=>'Create TvcMgmtChannelCluster', 'url'=>array('create')),
	array('label'=>'Manage TvcMgmtChannelCluster', 'url'=>array('admin')),
);
?>

<h1>Tvc Mgmt Channel Clusters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
