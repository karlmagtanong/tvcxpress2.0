<?php
/* @var $this TvcMgmtProducerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tvc Mgmt Producers',
);

$this->menu=array(
	array('label'=>'Create TvcMgmtProducer', 'url'=>array('create')),
	array('label'=>'Manage TvcMgmtProducer', 'url'=>array('admin')),
);
?>

<h1>Tvc Mgmt Producers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
