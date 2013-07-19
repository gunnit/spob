<?php
/* @var $this UserfundsController */
/* @var $model UserFunds */

$this->breadcrumbs=array(
	'User Funds'=>array('index'),
	$model->id_user,
);

$this->menu=array(
	array('label'=>'List UserFunds', 'url'=>array('index')),
	array('label'=>'Create UserFunds', 'url'=>array('create')),
	array('label'=>'Update UserFunds', 'url'=>array('update', 'id'=>$model->id_user)),
	array('label'=>'Delete UserFunds', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_user),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserFunds', 'url'=>array('admin')),
);
?>

<h1>View UserFunds #<?php echo $model->id_user; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_user',
		'funds',
		'block',
	),
)); ?>
