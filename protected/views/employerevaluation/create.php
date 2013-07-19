<?php
$this->breadcrumbs=array(
	'Employer Evaluations'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List EmployerEvaluation','url'=>array('index')),
array('label'=>'Manage EmployerEvaluation','url'=>array('admin')),
);
?>

<h1>Create EmployerEvaluation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>