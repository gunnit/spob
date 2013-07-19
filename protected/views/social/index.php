<?php
$this->breadcrumbs=array(
	'Socials',
);

$this->menu=array(
	array('label'=>'Create Social','url'=>array('create')),
	array('label'=>'Manage Social','url'=>array('admin')),
);
?>

<h1>Socials</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
