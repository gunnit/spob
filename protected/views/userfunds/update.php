<?php
/* @var $this UserfundsController */
/* @var $model UserFunds */

$this->breadcrumbs=array(
	'User Funds'=>array('index'),
	$model->id_user=>array('view','id'=>$model->id_user),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserFunds', 'url'=>array('index')),
	array('label'=>'Create UserFunds', 'url'=>array('create')),
	array('label'=>'View UserFunds', 'url'=>array('view', 'id'=>$model->id_user)),
	array('label'=>'Manage UserFunds', 'url'=>array('admin')),
);
?>

<h1>Update UserFunds <?php echo $model->id_user; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>