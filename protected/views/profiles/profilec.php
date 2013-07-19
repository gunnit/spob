<?php
/* @var $this ProfilesController */
/* @var $model Profiles */
$this->pageTitle = Yii::app()->name . ' - ' . __("Profile");
$this->breadcrumbs = array(
    __('Job List') => array(''),
    __('Profile') => array('profilec'),
    $model->name,
);

?>

<h1 class="well">
    <?php echo __('Profile overiview') ?>
</h1>
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
                ((!Yii::app()->getModule('user')->isEmployee()) ? array(
                    'label' => __('Search For A profile'),
                    'icon' => 'icon-search',
                    'url' => array('admin')) : array()),
                ((!Yii::app()->getModule('user')->isEmployee()) ? array(
                    'label' => __('List All Profiles'),
                    'icon' => 'icon-suitcase',
                    'url' => array('index')) : array()),
                array(
                    'label' => __('Edit Profile'),
                    'icon' => 'icon-wrench',
                    'url' => array('updatec', 'id' => Yii::app()->user->id)),
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
            <a data-toggle="tab" href="#yw1_tab_2"><?php echo __('Current Jobs'); ?></a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw1_tab_3"><?php echo __('Job History'); ?></a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw1_tab_4"><?php echo __('Details'); ?></a>
        </li>

    </ul>
    <div class="tab-content" >
        <div id="yw1_tab_1" class="tab-pane fade active in" >
            <div class="row-fluid">
                <?php $this->renderPartial('details/summaryc', array('model' => $model, 'social'=> $social, 'user'=>$user, 'funds'=>$funds)); ?>
            </div>
        </div>
        <div id="yw1_tab_2" class="tab-pane fade " >
             <div class="row-fluid">
                <?php $this->renderPartial('details/contractor', array('dataProvider' => $dataProvider)); ?>   
            </div>             
        </div>
        <div id="yw1_tab_3" class="tab-pane fade " >
           <?php $this->renderPartial('details/alljobs', array('history' => $history, 'funds'=>$funds)); ?>
        </div>
        <div id="yw1_tab_4" class="tab-pane fade " >
            <div class="row-fluid">
                <?php $this->renderPartial('details/contact', array('model' => $model)); ?>   
            </div>
        </div>
    </div>
</div>

<hr/>
<?php
Yii::app()->clientScript->registerScript(
        'link', 
        '$(".success").animate({opacity: 1.0}, 4000).fadeOut("slow");
         $(".error").animate({opacity: 1.0}, 4000).fadeOut("slow");',
        CClientScript::POS_READY
);
?>