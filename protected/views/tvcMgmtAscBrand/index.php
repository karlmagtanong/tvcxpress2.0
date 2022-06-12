<?php
/* @var $this TvcMgmtAscBrandController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tvc Mgmt Asc Brands',
);

$this->menu=array(
	array('label'=>'Create TvcMgmtAscBrand', 'url'=>array('create')),
	array('label'=>'Manage TvcMgmtAscBrand', 'url'=>array('admin')),
);
?>

<h1>Tvc Mgmt Asc Brands</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
