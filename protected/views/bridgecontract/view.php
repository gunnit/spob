<?php
$this->breadcrumbs=array(
	'Bridge Contracts'=>array('index'),
	$model->id_bridge_contract,
);

$this->menu=array(
	array('label'=>'List BridgeContract','url'=>array('index')),
	array('label'=>'Create BridgeContract','url'=>array('create')),
	array('label'=>'Update BridgeContract','url'=>array('update','id'=>$model->id_bridge_contract)),
	array('label'=>'Delete BridgeContract','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bridge_contract),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BridgeContract','url'=>array('admin')),
);
?>

<h1>View BridgeContract #<?php echo $model->id_bridge_contract; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_bridge_contract',
		'user_id',
		'id_employer_contract',
		'approved',
	),
)); ?>
