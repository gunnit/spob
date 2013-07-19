<?php
$this->breadcrumbs=array(
	'Socials'=>array('index'),
	$model->user_id,
);

$this->menu=array(
	array('label'=>'List Social','url'=>array('index')),
	array('label'=>'Create Social','url'=>array('create')),
	array('label'=>'Update Social','url'=>array('update','id'=>$model->user_id)),
	array('label'=>'Delete Social','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Social','url'=>array('admin')),
);
?>

<h1>View Social #<?php echo $model->user_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'user_id',
		'facebook',
		'twitter',
		'linkedin',
		'google',
	),
)); ?>
