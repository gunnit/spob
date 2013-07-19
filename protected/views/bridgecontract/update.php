<?php
$this->breadcrumbs=array(
	'Bridge Contracts'=>array('index'),
	$model->id_bridge_contract=>array('view','id'=>$model->id_bridge_contract),
	'Update',
);

$this->menu=array(
	array('label'=>'List BridgeContract','url'=>array('index')),
	array('label'=>'Create BridgeContract','url'=>array('create')),
	array('label'=>'View BridgeContract','url'=>array('view','id'=>$model->id_bridge_contract)),
	array('label'=>'Manage BridgeContract','url'=>array('admin')),
);
?>

<h1>Update BridgeContract <?php echo $model->id_bridge_contract; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>