<?php
/* @var $this ProfilesController */
/* @var $model Profiles */
$this->pageTitle = Yii::app()->name . ' - ' . __("Profile");
$this->breadcrumbs = array(
    __('Profile') => array('index'),
    __('Summary') => array('index'),
    $model->name,
);



$this->menu = array(
    ((!Yii::app()->getModule('user')->isEmployee()) ? array(
        'label' => __('Search For Aa profile'),
        'icon' => 'icon-search',
        'url' => array('admin')) : array()),
    array(
        'label' => __('Edit'),
        'icon' => 'icon-wrench',
        'url' => array('update', 'id' => Yii::app()->user->id)),
    array(
        'label' => __('Visual CV'),
        'icon' => 'icon-wrench',
        'url' => array('summary')),
    array(
        'label' => __('Export PDF'),
        'icon' => 'icon-wrench',
        'url' => array('pdfexport')),
    ((!Yii::app()->getModule('user')->isEmployee()) ? array(
        'label' => __('List All Profiles'),
        'icon' => 'icon-suitcase',
        'url' => array('index')) : array()),
//    ((!Yii::app()->getModule('user')->isAdmin()) ?array(
//        'label' => __('Delete Account'),
//        'url' => '#', 
//        'linkOptions' => array(
//            'submit' => array('delete', 
//                'id' => $model->user_id), 
//                'confirm' => __('Are you sure you want to delete this item?'))): array()),
//    ((!Yii::app()->getModule('user')->isAdmin()) ?array(
//        'label' => __('Manage Profiles'),
//        'url' => array('admin')) : array()),
);
?>

<h1 class="well"><?php echo __('Profile overiview for employee...') ?></h1>
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
<div class="row-fluid">
    <div class="offset1">
        <?php
        $this->widget('bootstrap.widgets.TbMenu', array(
            'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
            'stacked' => false, // whether this is a stacked menu
            'items' => array(
                array(
                    'label' => __('Edit Profile'),
                    'icon' => 'icon-wrench',
                    'url' => array('update', 'id' => $model->user_id)),
                array(
                    'label' => __('Edit Evaluation'),
                    'icon' => 'icon-wrench',
                    'url' => array('pdfexport')),
                array(
                    'label' => __('Visual CV'),
                    'icon' => 'icon-wrench',
                    'url' => array('visualcv', 'id'=>$model->user_id)),
                array(
                    'label' => __('Export PDF'),
                    'icon' => 'icon-wrench',
                    'url' => array('pdfexport')),
              ),
        ));
        ?>
    </div>
</div>
<div class="togglable-tabs tabs-left" id="yw1">
    <ul id="yw40" class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#yw1_tab_1"><?php echo __('Profile'); ?></a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw1_tab_2"><?php echo __('Notifications'); ?></a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw1_tab_3"><?php echo __('Current Jobs'); ?></a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw1_tab_4"><?php echo __('Details'); ?></a>
        </li>

    </ul>
    <div class="tab-content" >
        <div id="yw1_tab_1" class="tab-pane fade active in" >

            <div class="row-fluid">

                <div class="span9">
                <?php $this->renderPartial('details/summary', array('model' => $model, 'social' => $social)); ?>
                </div>
                <div class="span2 offset1">
                    <a href="evaluation"><div class="chart" data-percent="73">73%</div></a>Overall Satisfaction
                    <div class="chart" data-percent="43">43%</div>Physical Skills 
                    <!--                    - Strenght - Speed - Agility - Stamina - Coordination  -->
                    <div class="chart" data-percent="13">43%</div>Soft Skills
                    <!--                    - Communication - Adaptability - Problem Solving - Conflict Resolution -  Work ethic - Positive attitude-->
                    <div class="chart" data-percent="53">43%</div>Teamwork 
                    <!--                    - Listening - Questioning - Persuading - Respecting - Helping - Participating-->
                    <div class="chart" data-percent="83">43%</div>Leadership 
                    <!--                    - Honesty - Sense of Humor - Confidence - Commitment - Positive Attitude - Creativity - Intuition - Ability to Inspire-->

                </div>

            </div>
        </div>
        <div id="yw1_tab_2" class="tab-pane fade " >            
<?php $this->renderPartial('details/details', array('model' => $model)); ?>
        </div>
        <div id="yw1_tab_3" class="tab-pane fade " >
            <div class="row-fluid">
<?php $this->renderPartial('details/jobs', array('jobs' => $jobs, 'funds'=>$funds)); ?>   
            </div>
        </div>
        <div id="yw1_tab_4" class="tab-pane fade " >
            <div class="row-fluid">
<?php $this->renderPartial('details/contact', array('jobs' => $model)); ?>   
            </div>
        </div>
    </div>
</div>

<hr/>

<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl . '/js/indicator/jquery.easy-pie-chart.js');
$cs->registerCssFile($baseUrl . '/js/indicator/jquery.easy-pie-chart.css');
//in your view where you want to include JavaScripts

$cs->registerScript('indicators', '$(function() {
    $(".chart").easyPieChart({
        //your configuration goes here
    });
});', CClientScript::POS_END
);
?>