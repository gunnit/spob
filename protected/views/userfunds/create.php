<?php
/* @var $this UserfundsController */
/* @var $model UserFunds */

$this->breadcrumbs=array(
	'User Funds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserFunds', 'url'=>array('index')),
	array('label'=>'Manage UserFunds', 'url'=>array('admin')),
);
?>

<h1>Create UserFunds</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>