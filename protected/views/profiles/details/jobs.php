<?php
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'filter'=>$jobs,
    'fixedHeader' => true,
    'headerOffset' => 20,
    'responsiveTable' => true,
    'type'=>'striped bordered',
    'id' => 'bridge-contract-grid',
    'template' => "{items}\n{extendedSummary}",
    'dataProvider' => $jobs->searchEmployee(),
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
       
        'approved:boolean',
        'confirmed:boolean',
         array(
            'header' => __('Cost'),
            'name' => 'id_employer_contract',
            'value' => 'Yii::app()->numberFormatter->formatCurrency($data->idEmployerContract->cost, "EUR")',
            //'class'=>'bootstrap.widgets.TbTotalSumColumn'
            ),
//        array(
//            'htmlOptions' => array('nowrap'=>'nowrap'),
//            'class'=>'bootstrap.widgets.TbButtonColumn',
//            'viewButtonUrl'=>null,
//            'updateButtonUrl'=>null,
//            'deleteButtonUrl'=>null,
//        ),
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
    ),
    'extendedSummary' => array(
        'title' => 'Total Cash Available',
        'columns' => array(
            'id_employer_contract' => array('label'=>'Total Cash Earned', 'class'=>'TbSumOperation')
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        'style' => 'width:300px'
    ),
));
?>
<div class="well pull-right extended-summary" style="width:300px;float:left;">
    <h3>Total Cash Earned</h3>Total Cash Earned: <?php echo (int)$funds->funds; ?><br></div>