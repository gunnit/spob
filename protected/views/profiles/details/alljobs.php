<?php
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
     'fixedHeader' => true,
    'headerOffset' => 40,
    'responsiveTable' => true,
    'type'=>'striped bordered',
    'template' => "{items}\n{extendedSummary}",
    'id' => 'employer-contract-grid',
    'dataProvider' => $history->searchalljobs(),
    'filter' => $history,
    'columns' => array(
        'title',
        array(
            'header' => __('Cost'),
            'name' => 'id_employer_contract',
            'value' => 'Yii::app()->numberFormatter->formatCurrency($data->cost, "EUR")',
            //'class'=>'bootstrap.widgets.TbTotalSumColumn'
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
        'status:boolean',
        array(
            'header' => Yii::t('ses', 'Open'),
            //'htmlOptions'=>array('style'=>'width: 35px'),
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    //'label'=>'Goals >>',
                    'options' => array('target' => '_blank')
            )),
            'viewButtonUrl' => 'Yii::app()->createUrl(\'employercontract/view/\'. $data->id_employer_contract)',
        ),
    ),
    'extendedSummary' => array(
        'title' => 'Expenses',
        'columns' => array(
	        'tipology' => array(
		        'label'=>'Expenses to be paied',
		        'types' => array(
			        'no'=>array('label'=>'Not Paied'),
			        'yes'=>array('label'=>'Paied')
		        ),
		        'class'=>'TbPercentOfTypeEasyPieOperation',
		        // you can also configure how the chart looks like
		        'chartOptions' => array(
			        'barColor' => '#333',
			        'trackColor' => '#999',
			        'lineWidth' => 8 ,
			        'lineCap' => 'square'
		        )
	        ),
           
            'id_employer_contract' => array(
                'label'=>'Total Expenses', 
                'class'=>'TbSumOperation')
        
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        'style' => 'width:350px'
    ),

));

?>
Total Cash Aavailable : <b><?php echo (int)$funds->funds; ?></b>