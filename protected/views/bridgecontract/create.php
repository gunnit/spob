<?php
$this->breadcrumbs=array(
	'Bridge Contracts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BridgeContract','url'=>array('index')),
	array('label'=>'Manage BridgeContract','url'=>array('admin')),
);
?>

<h1>Create BridgeContract</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>