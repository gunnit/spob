
<?php

$this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' => array(
        'credits' => array('enabled' => false),
        'chart' => array(
            'type' => 'column',
            'plotBackgroundColor' => null,
            'plotBorderWidth' => null,
            'plotShadow' => false,
        ),
        'title' => array(
            'text' => __('Overall Satisfaction'),
        ),
         'subtitle'=>array(
               'text' => __('Overall Satisfaction'),
         ), 
        'xAxis' => array(
            'categories' => array(
                __('Physical Skills'),
                __('Soft Skills'),
                __('Teamwork'),
                __('Leadership'))
        ),
        'yAxis' => array(
            'title' => array(
                'text' => __('Satisfaction Level')
            )
        ),
        'series' => array(
            array(
                'name' => __('Employer Evaluation'),
                'data' => array(
                    (int) $model->physical_skills,
                    (int) $model->soft_skills,
                    (int) $model->teamwork,
                    (int) $model->leadership)),
        )
    )
));
//$this->Widget('ext.highcharts.HighchartsWidget', array(
//    'options' => array(
//        'credits' => array('enabled' => false),
//        'chart' => array(
//            'type' => 'line',
//            'polar' => true,
//            'renderTo' => 'container',
//            'plotBackgroundColor' => null,
//            'plotBorderWidth' => null,
//            'plotShadow' => false,
//        ),
//        'title' => array(
//            'text' => 'Overall Satisfaction',
//            'x' => -80
//            ),
//        'pane' => array(
//            'size' => '80%'
//            ),
//        'xAxis' => array(
//            'categories' => array('Physical Skills', 'Soft Skills', 'Teamwork', 'Leadership'),
//            'tickmarkPlacement' => 'on',
//            'lineWidth' => 0
//        ),
//        'yAxis' => array(
//            'gridLineInterpolation' => 'polygon',
//            'lineWidth' => 0,
//            'min' => 0
//        ),
//        'tooltip' => array(
//            'formatter' => 'js:function(){ return this.series.name; }'
//        ),
//        'legend' => array(
//            'align' => 'right',
//            'verticalAlign' => 'top',
//            'y' => 100,
//            'layout' => 'vertical',
//        ),
//        'series' => array(
//            array(
//                'name' => 'Self Evaluation',
//                'data' => array($model->physical_skills, $model->soft_skills, $model->teamwork, $model->leadership),
//                'pointPlacement' => 'on'),
//          
//        )
//    )
//));
?>