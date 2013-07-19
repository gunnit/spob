<?php
$this->breadcrumbs=array(
	'Bridge Contracts',
);

$this->menu=array(
	array('label'=>'Create BridgeContract','url'=>array('create')),
	array('label'=>'Manage BridgeContract','url'=>array('admin')),
);
?>

<h1>Bridge Contracts</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
