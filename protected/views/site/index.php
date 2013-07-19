<?php $this->pageTitle = Yii::app()->name; ?>
<?php
//Yii::app()->clientScript->registerScript(
//        'link', '$(".success").animate({opacity: 1.0}, 4000).fadeOut("slow");', 
//        CClientScript::POS_READY
//);

$users = User::model()->count(array(
    'condition' => 'status=:status',
    'params' => array( 
        ':status' => 1,
    )
        ));
$jobs = EmployerContract::model()->count(array(
    'condition' => 'status=:status',
    'params' => array(
        ':status' => 1,
    )
        ));
?>
<div class="success">
    <?php //echo Yii::app()->user->getFlash('success');  ?>
    <?php
    $this->widget('bootstrap.widgets.TbAlert', array(
        'block' => true, // display a larger alert block?
        'fade' => true, // use transitions?
        'closeText' => '&times;', // close link text - if set to false, no close link is displayed
        'alerts' => array(// configurations per alert type
            'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
            'error' => array('block' => true, 'fade' => true, 'closeText' => '&times;'),
        ),
    ));
    ?>
</div>
<div class="jumbotron masthead">
    <br><br><br><br><br> <br><br><br><br><br><br><br><br><br>
    <div class="container">
        <img class="bg-logo" alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/home_banner.png">
       

        <form class="form-search" method="get" action="employercontract/quick">
            <div class="input-prepend">           
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'type' => 'primary',
                    'size' => 'large',
                    'label' => 'Search',
                    'htmlOptions' => array('id' => 'buttonStateful'),
                ));
                ?>
                <?php
                $dataProvider = new CActiveDataProvider('EmployerContract');

                $dataArray = $dataProvider->getData();
                $myarray = array();

                foreach ($dataArray as $data) {
                    array_push($myarray, CHtml::encode($data->title));
                }


                $this->widget('bootstrap.widgets.TbTypeahead', array(
                    'name' => 'q',
                    'options' => array(
                        'name' => 'typeahead',
                        'source' => $myarray,
                        'items' => 4,
                        'matcher' => "js:function(item) {
                        return ~item.toLowerCase().indexOf(this.query.toLowerCase());
                    }",
                    ),
                    'htmlOptions' => array('class' => 'span2 search-query', 'placeholder' => __("search for a job"), 'type' => 'search', 'value' => ''),
                ));
                ?> 
            </div>
        </form>


        <ul class="masthead-links">
            <li><a href="#" onclick="_gaq.push(['_trackEvent', 'Jumbotron actions', 'Jumbotron links', 'GitHub project']);">Facebook Page</a></li>
            <li>Version 1.0.6</li>
        </ul>
    </div>
</div>

<div class="bs-docs-social">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h2><?php echo __('SPOT'); ?></h2>
                <p><?php echo __('You are looking a quick part time job than you are at the right place. 
                If you want to make some easy and quick cash, make new friends and develop new skills
                than you are at the right place. Learn , have fun and make cash.') ?></p>
                <p>
                    <span class="numberCircle"><?php echo $users; ?></span>
                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => __('Find Jobs'),
                        'type' => 'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        'size' => 'large', // null, 'large', 'small' or 'mini'
                        'icon' => 'search',
                        'url' => array('employercontract/index'),
                    ));
                    ?>
                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => __('Details'),
                        'type' => 'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        'size' => 'large', // null, 'large', 'small' or 'mini'
                        'icon' => 'star',
                        'url' => array('/site/page', 'view' => 'about',),
                    ));
                    ?></p>
            </div>


            <div class="span5">
                <h2><?php echo __('JOB'); ?></h2>
                <p><?php echo __('Your next employee is just around the corner. 
                    SPOB is the best place to find casual, part-time and entry level staff.
                    If you are a company or an individual that needs help then...') ?></p>
                <p>
                    <span class="numberCircle"><?php echo $jobs; ?></span>
                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => __('Post a Job'),
                        'type' => 'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        'size' => 'large', // null, 'large', 'small' or 'mini'
                        'icon' => 'coffee',
                        'url' => array('employercontract/create'),
                    ));
                    ?>
                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => __('Details'),
                        'type' => 'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        'size' => 'large', // null, 'large', 'small' or 'mini'
                        'icon' => 'star',
                        'url' => array('/site/page', 'view' => 'employer',),
                    ));
                    ?></p>

            </div> 

        </div>
    </div>
</div>
<!--
<div class="well well-large well-transparent lead">
    <div class="row-fluid">
        <div class="span1">
            <i class="icon-quote-left icon-4x pull-left icon-muted"></i>
        </div>
        <div class="span10">
            Ciao da SPOB   
        </div>
        <div class="span1">
            <i class="icon-quote-right icon-4x pull-left icon-muted"></i>
        </div>
    </div>
</div>-->