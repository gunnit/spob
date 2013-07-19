<?php
$this->breadcrumbs=array(
	'Socials'=>array('index'),
	$model->user_id=>array('view','id'=>$model->user_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Social','url'=>array('index')),
	array('label'=>'Create Social','url'=>array('create')),
	array('label'=>'View Social','url'=>array('view','id'=>$model->user_id)),
	array('label'=>'Manage Social','url'=>array('admin')),
);
?>

<h1>Update Social <?php echo $model->user_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>