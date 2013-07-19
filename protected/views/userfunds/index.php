<?php
/* @var $this UserfundsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Funds',
);

$this->menu=array(
	array('label'=>'Create UserFunds', 'url'=>array('create')),
	array('label'=>'Manage UserFunds', 'url'=>array('admin')),
);
?>

<h1>User Funds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
