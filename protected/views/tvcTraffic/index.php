<?php
/* @var $this TvcTrafficController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tvc Traffics',
);

$this->menu=array(
	array('label'=>'Create TvcTraffic', 'url'=>array('create')),
	array('label'=>'Manage TvcTraffic', 'url'=>array('admin')),
);
?>

<h1>Tvc Traffics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
