<?php
$this->breadcrumbs = array(
    _('List all jobs') => array('employercontract/index'),
    __('Applied jobs'),
);

$this->menu = array(
    array(
        'label' => __('List Jobs'),
        'icon' => 'icon-suitcase',
        'url' => array('employercontract/index')),
    array(
        'label' => __('Search A Job'),
        'icon' => 'icon-search',
        'url' => array('employercontract/admin')),
);
?>

<div class="page-header">
    <h1 ><?php echo __('Applied Jobs'); ?> <small> <?php echo __('All Jobs applied by me'); ?></small></h1>
</div>


<?php
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'fixedHeader' => true,
    'headerOffset' => 40,
    'responsiveTable' => true,
    'id' => 'bridge-contract-grid',
    'dataProvider' => $model->searchEmployee(),
    'columns' => array(
        array(
            'class' => 'CLinkColumn',
            'header' => __('Job Title'),
            'labelExpression' => '$data->idEmployerContract->title',
            'urlExpression' => 'Yii::app()->createUrl("employercontract/view",array("id"=>$data->id_employer_contract))',
        ),
        array(
            'header' => __('Start Date'),
            'value' => 'Yii::app()->dateFormatter->format("dd MMM yyyy / H : mm",$data->idEmployerContract->start_date)',
        ),
        array(
            'header' => __('End Date'),
            'value' => 'Yii::app()->dateFormatter->format("dd MMM yyyy / H : mm",$data->idEmployerContract->end_date)',
        ),
        array(
            'header' => __('Cost'),
            'name' => 'id_employer_contract',
            'value' => 'Yii::app()->numberFormatter->formatCurrency($data->idEmployerContract->cost, "EUR")',
        ),
        'approved:boolean',
       
        array(
            'header' => __('View Details'),
            'template' => '{view}',
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'buttons' => array(
                'view' => array(
                    'viewButtonUrl' => 'Yii::app()->createUrl(\'employercontract/view/\'. $data->id_employer_contract)',
                ),
            )
        )
    )
));
?>
