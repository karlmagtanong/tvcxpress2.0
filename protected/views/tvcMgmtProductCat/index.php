<?php
/* @var $this TvcMgmtProductCatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tvc Mgmt Product Cats',
);

$this->menu=array(
	array('label'=>'Create TvcMgmtProductCat', 'url'=>array('create')),
	array('label'=>'Manage TvcMgmtProductCat', 'url'=>array('admin')),
);
?>

<h1>Tvc Mgmt Product Cats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
