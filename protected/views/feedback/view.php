<?php
$this->breadcrumbs=array(
	'Feedbacks'=>array('index'),
	$model->id_feedback,
);

$this->menu=array(
array('label'=>'List Feedback','url'=>array('index')),
array('label'=>'Create Feedback','url'=>array('create')),
array('label'=>'Update Feedback','url'=>array('update','id'=>$model->id_feedback)),
array('label'=>'Delete Feedback','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_feedback),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Feedback','url'=>array('admin')),
);
?>

<h1>View Feedback #<?php echo $model->id_feedback; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_feedback',
		'user_id',
		'creation_date',
		'description',
		'status',
),
)); ?>
