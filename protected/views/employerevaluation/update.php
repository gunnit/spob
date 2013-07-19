<?php
$this->breadcrumbs=array(
	'Employer Evaluations'=>array('index'),
	$model->job_id=>array('view','id'=>$model->job_id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List EmployerEvaluation','url'=>array('index')),
	array('label'=>'Create EmployerEvaluation','url'=>array('create')),
	array('label'=>'View EmployerEvaluation','url'=>array('view','id'=>$model->job_id)),
	array('label'=>'Manage EmployerEvaluation','url'=>array('admin')),
	);
	?>

	<h1>Update EmployerEvaluation <?php echo $model->job_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>