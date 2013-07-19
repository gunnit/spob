<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-more.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
  

    $(function () {

        $('#container2').highcharts({
	            
            chart: {
                polar: true,
                type: 'line'
            },
	    
            title: {
                text: 'Employer Evaluation',
                x: -80
            },
	    
            pane: {
                size: '80%'
            },
	    
            xAxis: {
                categories: ['Physical Skills', 'Soft Skills', 'Teamwork', 'Leadership', 
                    'Satisfaction', 'Knowledge'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
	        
            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 0
            },
	    
            tooltip: {
                shared: true,
                pointFormat: '<span style="color:{series.color}">{series.name}: <b>--{point.y:,.0f}</b><br/>'
            },
	    
            legend: {
                align: 'right',
                verticalAlign: 'top',
                y: 100,
                layout: 'vertical'
            },
	    
            series: [{
                    name: 'Self Evaluation',
                    data: [43, 19, 60, 35, 17, 10],
                    pointPlacement: 'on'
                }, {
                    name: 'Employer Evaluation',
                    data: [50, 39, 42, 31, 26, 14],
                    pointPlacement: 'on'
                }]
	
        });
    });
</script>
<div id="container" style="width: 700px; height: 400px; margin: 0 auto"></div>
<?php
$this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' => array(
        'credits' => array('enabled' => false),
        'chart' => array(
            'type' => 'line',
            'poler' => true,
            'renderTo' => 'container',
            'plotBackgroundColor' => null,
            'plotBorderWidth' => null,
            'plotShadow' => false,
        ),
        'title' => array(
            'text' => 'Overall Satisfaction',
            'x' => -80),
        'pane' => array(
            'size' => '80%'),
        'xAxis' => array(
            'categories' => array('Physical Skills', 'Soft Skills', 'Teamwork', 'Leadership',
                'Satisfaction', 'Knowledge'),
            'tickmarkPlacement' => 'on',
            'lineWidth' => 0
        ),
        'yAxis' => array(
            'gridLineInterpolation' => 'polygon',
            'lineWidth' => 0,
            'min' => 0
        ),
        'tooltip' => array(
            'formatter' => 'js:function(){ return this.series.name; }'
        ),
        'legend' => array(
            'align' => 'right',
            'verticalAlign' => 'top',
            'y' => 100,
            'layout' => 'vertical',
        ),
        'series' => array(
            array(
                'name' => 'Self Evaluation',
                'data' => array(43, 19, 60, 35, 17, 10),
                'pointPlacement' => 'on'),
            array(
                'name' => 'Employer Evaluation',
                'data' => array(50, 39, 42, 31, 26, 14),
                'pointPlacement' => 'on')
        )
    )
));
?>