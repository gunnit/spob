<?php
$this->breadcrumbs=array(
	'Bridge Contracts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BridgeContract','url'=>array('index')),
	array('label'=>'Create BridgeContract','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('bridge-contract-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Applied Jobs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'bridge-contract-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_bridge_contract',
		'user_id',
		'id_employer_contract',
                array(
                'header' => __('Title'),
                'name' => 'id_employer_contract',
                'value' => '$data->idEmployerContract->title',
                //'filter' => CHtml::listData(UserRegistry::model()->findAll(), 'id_user_registry', 'firstname' ),
                ),
		'approved',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
