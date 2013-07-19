<?php
$this->breadcrumbs=array(
	'Employer Evaluations',
);

$this->menu=array(
array('label'=>'Create EmployerEvaluation','url'=>array('create')),
array('label'=>'Manage EmployerEvaluation','url'=>array('admin')),
);
?>

<h1>Employer Evaluations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
