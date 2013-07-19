<h3>Manage Users that applied for tthe job</h3>
<?php

$criteriaCondition = 'id_employer_contract=' . $model->id_employer_contract;
$partecipants = new CActiveDataProvider('BridgeContract', array(
            'criteria' => array(
                'condition' => $criteriaCondition,
            //'order'=>'creation_date DESC',
            )
        ));

Yii::app()->getModule("user");
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'bridge-contract-grid',
    'dataProvider' => $partecipants,
    'columns' => array(
        array(
            'class' => 'CLinkColumn',
            'header' => __('User'),
            'labelExpression' => '$data->user->username',
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
            'header' => __('cost'),
            'name' => 'id_employer_contract',
            'value' => '$data->idEmployerContract->cost',
        //'filter' => CHtml::listData(UserRegistry::model()->findAll(), 'id_user_registry', 'firstname' ),
        ),
        'approved:boolean',
        array(
            'header' => __('Approve User'),
            'class' => 'bootstrap.widgets.TbToggleColumn',
            'toggleAction' => 'bridgecontract/toggle',
            'name' => 'approved',
        ),
        'confirmed:boolean',
        array(
            'header' => __('Job Completed'),
            'class' => 'bootstrap.widgets.TbToggleColumn',
            'toggleAction' => 'bridgecontract/toggle',
            'name' => 'confirmed',
        ),
        array(
            'header' => __('View Resume'),
            //'htmlOptions'=>array('style'=>'width: 35px'),
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}',
            'buttons' => array(
                'view' => array(
                //'label'=>'Goals >>',
                //'options' => array('target' => '_blank')
            )),
            'viewButtonUrl' => 'Yii::app()->createUrl(\'profiles/visualcv/\'. $data->user_id)',
        ),
//             array(
//                    'header'=>'',
//                    'type'=>'html',
//                    'value'=>function($data){
//                        return CHtml::link('<i class="icon-comment"></i>',
//                                array('/employerevaluation/create', 'employee_id' => $data->user_id, 'job_id' => $data->id_employer_contract, 'id_employer' => Yii::app()->user->id),
//                                array(
//                                    'id'=>'yw3',
//                                    'class'=>'pull-right btn btn-info btn-small',
//                                   // 'target'=>'_blank',
//                                ));
//                    },
//                ),
    ),
));
?>
    