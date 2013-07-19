<?php
$this->breadcrumbs = array(
    __('List all jobs') => array('index'),
    __('Job Search'),
);

$this->menu = array(
    ((!Yii::app()->getModule('user')->isEmployee()) ? array(
        'label' => __('Create New Job'),
        'icon' => 'icon-pencil',
        'url' => array('create')) : array()),
    array(
        'label' => __('List Jobs'),
        'icon' => 'icon-suitcase',
        'url' => array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('employer-contract-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header">
    <h1 ><?php echo __('Search For Jobs'); ?> <small> <?php echo __('Find the right job for you'); ?></small></h1>
</div>
<div class="accordion" id="accordion2">
<?php $collapse = $this->beginWidget('bootstrap.widgets.TbCollapse');?>
<div class="accordion-group">
    <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
            Collapsible Group Item #1
        </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse in">
        <div class="accordion-inner">
            Anim pariatur cliche...
        </div>
    </div>
</div>
<div class="accordion-group">
  <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
          Collapsible Group Item #2
      </a>
  </div>
  <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
          Anim pariatur cliche...
      </div>
  </div>
</div>
<?php $this->endWidget();?>


<?php echo CHtml::link(__('Advanced Search'), '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'employer-contract-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'title',
        array(
            'name' => 'cost',
            'value' => '$data->cost . " €" ',
        ),
        array(
            'name' => 'tipology',
            'value' => 'Lookup::item(\'tipology\',$data->tipology)',
            'filter' => Lookup::items('tipology'),
        ),
        array(
            'name' => 'creation_date',
            'value' => 'Yii::app()->dateFormatter->format("dd MMMM yyyy ",$data->creation_date);',
            'htmlOptions' => array('style' => 'white-space: nowrap;',),
        ),
        array(
            'name' => 'start_date',
            'value' => 'Yii::app()->dateFormatter->format("dd MMMM yyyy ",$data->start_date);',
            'htmlOptions' => array('style' => 'white-space: nowrap;',),
        ),
        array(
            'name' => 'end_date',
            'value' => 'Yii::app()->dateFormatter->format("dd MMMM yyyy ",$data->end_date);',
            'htmlOptions' => array('style' => 'white-space: nowrap;',),
        ),
        array(
            'header' => __('User'),
            'name' => 'id_employer_contract',
            'value' => '$data->user->username'),
        array(
            'name' => 'indoors',
            'value' => 'Lookup::item(\'indoors\',$data->indoors)',
            'filter' => Lookup::items('indoors'),
        ),
        array(
            'name' => 'customer_facing',
            'value' => 'Lookup::item(\'option\',$data->customer_facing)',
            'filter' => Lookup::items('option'),
        ),
        array(
            'name' => 'day_period',
            'value' => 'Lookup::item(\'day_period\',$data->day_period)',
            'filter' => Lookup::items('day_period'),
        ),
        array(
            'header' => Yii::t('ses', 'Open'),
            //'htmlOptions'=>array('style'=>'width: 35px'),
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}',
            'buttons' => array(
                'view' => array(
                    //'label'=>'Goals >>',
                    'options' => array('target' => '_blank')
            )),
            'viewButtonUrl' => 'Yii::app()->createUrl(\'employercontract/view/\'. $data->id_employer_contract)',
        ),
    ),
));
?>
