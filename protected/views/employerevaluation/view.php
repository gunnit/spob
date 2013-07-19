<?php
$this->breadcrumbs=array(
	'Employer Evaluations'=>array('index'),
	$model->job_id,
);

$this->menu=array(
array('label'=>'List EmployerEvaluation','url'=>array('index')),
array('label'=>'Create EmployerEvaluation','url'=>array('create')),
array('label'=>'Update EmployerEvaluation','url'=>array('update','id'=>$model->job_id)),
array('label'=>'Delete EmployerEvaluation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->job_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage EmployerEvaluation','url'=>array('admin')),
);
?>

<h1>View EmployerEvaluation #<?php echo $model->job_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'job_id',
		'employee_id',
		'contractor_id',
		'comment',
		'creation_date',
		'soft_skills',
		'physical_skills',
		'teamwork',
		'leadership',
),
)); ?>
If you are an employee confirm the employer review on this job