<?php
$this->breadcrumbs=array(
	'Lookups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Lookup','url'=>array('index')),
	array('label'=>'Create Lookup','url'=>array('create')),
	array('label'=>'Update Lookup','url'=>array('update','id'=>$model->id_lookup)),
	array('label'=>'Delete Lookup','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_lookup),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lookup','url'=>array('admin')),
);
?>

<h1>View Lookup #<?php echo $model->id_lookup; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_lookup',
		'name',
		'code',
		'type',
	),
)); ?>
