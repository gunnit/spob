<?php //Yii::app()->facebook->ogTags['og:title'] = $model->title; ?>
<?php 
Yii::app()->clientScript->registerScript('toggle', "
 
    $('#b_prev').click(function(){
        var index=parseInt($('#yw40 li.active a').attr('href').substring(10));
        var index_2=index-2;
        var index_1=index-1;
        
        $('#yw40 li.active').removeClass('active');
        $('#yw40 > li:eq('+index_2+')').addClass('active');
        $('#yw39_tab_'+index).removeClass('active').removeClass('in');
        $('#yw39_tab_'+index_1).addClass('active').addClass('in');
        
        if (index==2) $('#b_prev').hide();
        if (index==4) $('#b_next').show();
        
        return false;
    });
    
    $('#b_next').click(function(){
        var index=parseInt($('#yw40 li.active a').attr('href').substring(10));
        if (index==4) return false;
        var index_1=index+1;
        
        $('#yw40 li.active').removeClass('active');
        $('#yw40 > li:eq('+index+')').addClass('active');
        $('#yw39_tab_'+index).removeClass('active').removeClass('in');
        $('#yw39_tab_'+index_1).addClass('active').addClass('in');
        
        if (index==3) $('#b_next').hide();
        if (index==1) $('#b_prev').show();
        
        return false;
    });
    
    $('#yw40 > li a').click(function(){
        var index=parseInt($(this).attr('href').substring(4));
        
        if (index==4){
            $('#b_next').hide();
        }
        else{
            $('#b_next').show();
        }
            
        if (index==1){
            $('#b_prev').hide();
        }
        else{
            $('#b_prev').show();
        }
    });
    ");
?>
<?php
$this->breadcrumbs = array(
    __('List all jobs') => array('index'),
    $model->title,
);


if(!Yii::app()->user->isGuest){
$this->menu = array(
    ((!Yii::app()->getModule('user')->isEmployee()) ? array(
        'label' => __('Create New Job'),
        'icon' => 'icon-pencil',
        'url' => array('create')) : array()),
    array(
        'label' => __('List Jobs'),
        'icon' => 'icon-suitcase',
        'url' => array('index')),
     array(
        'label' => __('Export PDF'),
        'icon' => 'icon-wrench',
        'url' => array('pdfexport', 'id_employer_contract'=>$model->id_employer_contract)),
    array(
        'label' => __('Search A Job'),
        'icon' => 'icon-search',
        'url' => array('admin')),
    ((!Yii::app()->getModule('user')->isEmployee()) && $model->user_id == Yii::app()->user->id ? array(
        'label' => __('Update Job'),
        'icon' => 'icon-wrench',
        'url' => array(
            'update', 'id' => $model->id_employer_contract)) : array()),
    ((!Yii::app()->getModule('user')->isEmployee()) && $model->user_id == Yii::app()->user->id ? array(
        'label' => __('Delete Job'),
        'icon' => 'icon-trash',
        'url' => '#', 'linkOptions' => array(
            'submit' => array('delete', 'id' => $model->id_employer_contract),
            'confirm' => __('Are you sure you want to delete this item?'))) : array()),
);
}

$partecipants = BridgeContract::model()->count(array(
    'condition' => 'id_employer_contract=:id_employer_contract and user_id=:user_id',
    'params' => array(
        ':id_employer_contract' => $model->id_employer_contract,
        ':user_id' => Yii::app()->user->id,
    )
        ));
if ($partecipants == 0) {
    $text = __('No one has yet applied for this Spot Yob');
} else {
    $text = __('Currently ') . $partecipants . __(' have applied to this job posting');
}

//find the date for the job 
$dates_day_start = Yii::app()->dateFormatter->format("dd", $model->start_date);
$dates_month_start = Yii::app()->dateFormatter->format("MMM", $model->start_date);
$dates_day_end = Yii::app()->dateFormatter->format("dd", $model->end_date);
$dates_month_end = Yii::app()->dateFormatter->format("MMM", $model->end_date);
$dates_day_created = Yii::app()->dateFormatter->format("dd", $model->creation_date);
$dates_month_created = Yii::app()->dateFormatter->format("MMM", $model->creation_date);
?>

<div class="page-header">
    <h1 ><?php echo __('View Job Details for #'); ?> <small> <?php echo $model->title ?></small></h1>
</div>
<div class="togglable-tabs tabs-left" id="yw39">
    <ul id="yw40" class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#yw39_tab_1"><?php echo __('Job Details'); ?></a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw39_tab_2"><?php echo __('Date & Time'); ?></a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw39_tab_3"><?php echo __('Location'); ?></a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw39_tab_4"><?php echo __('Details'); ?></a>
        </li>

    </ul>
    <div class="tab-content" >
        <div id="yw39_tab_1" class="tab-pane fade active in" >
            Job Description
            <div class="well well-large well-transparent lead">
                <div class="row-fluid">
                    <div class="span1">
                        <i class="icon-quote-left icon-2x pull-left icon-muted"></i>
                    </div>
                    <div class="span9">
                        <?php echo $model->description; ?>  
                    </div>
                    <div class="span1">
                        <i class="icon-quote-right icon-2x pull-left icon-muted"></i>
                    </div>
                </div>
            </div>
            Cost = 
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => $model->cost . ' €',
                'type' => 'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'size' => 'large', // null, 'large', 'small' or 'mini'
                'disabled' => true
            ));
            ?>
            Job Type = 
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => Lookup::item('tipology', $model->tipology),
                'type' => 'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'size' => 'large', // null, 'large', 'small' or 'mini'
                'disabled' => true
            ));
            ?>
        </div>
        <div id="yw39_tab_2" class="tab-pane fade" >
            Start Date
            <div class="date" style="line-height: 1;">
                <a href="#" rel="tooltip" style="text-decoration: none;" data-original-title="Start Date">
                    <p><?php echo $dates_day_start; ?><span><?php echo $dates_month_start; ?></span></p>
                </a>           
            </div>
            <hr>
            End Date
            <div class="date" style="line-height: 1;">
                <a href="#" rel="tooltip" style="text-decoration: none;" data-original-title="End Date">
                    <p><?php echo $dates_day_end; ?><span><?php echo $dates_month_end; ?></span></p>
                </a>           
            </div>

            Day Period = <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => Lookup::item('day_period', $model->day_period),
                'type' => 'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'size' => 'large', // null, 'large', 'small' or 'mini'
                'disabled' => true
            ));
            ?>

        </div>
        <div id="yw39_tab_3" class="tab-pane fade" >
            <div class="row-fluid">
                <div class="span5">
                    <?php
                    $this->widget('application.extensions.gmap.GMap', array(
                        'id' => 'gmap', //id of the <div> container created
                        'key' => 'AIzaSyBR8crB1GTdAn6JvqOU99AE0nab5NyTeu8', //goole API key, should be obtained for each site,it's free
                        'label' => $model->title, //text written in the text bubble
                        'address' => array(
                            'address' => $model->street, //address of the place
                            'city' => $model->city, //city
                            'state' => $model->state, //state
                            'country' => $model->country,
                        //'zip' => 'XXXXX' - zip or postal code
                        )
                    ));
                    ?>
                </div>
                <div class="span5 offset1">
                    <address>
                        <strong>Nome Azineda.</strong><br>
                        <?php echo $model->street; ?><br>
                        <?php echo $model->city; ?>, CA 94107<br>
                        <?php echo $model->country; ?><br>
                        <abbr title="Phone">Tel:</abbr> (123) 456-7890
                    </address>

                    <address>
                        <strong><?php echo $model->user_id; ?></strong><br>
                        <a href="mailto:#">first.last@example.com(contact info and creation user)</a>
                    </address>
                </div>
            </div>

        </div> 
        <div id="yw39_tab_4" class="tab-pane fade" >

            Publication Date
            <div class="date" style="line-height: 1;">
                <a href="#" rel="tooltip" style="text-decoration: none;" data-original-title="Creation Date">
                    <p><?php echo $dates_day_created; ?><span><?php echo $dates_month_created; ?></span></p>
                </a>           
            </div>
            <br/>
            Sceen =
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => Lookup::item('indoors', $model->indoors),
                'type' => 'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'size' => 'large', // null, 'large', 'small' or 'mini'
                'disabled' => true
            ));
            ?>
            Customer Facing = 
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => Lookup::item('option', $model->customer_facing),
                'type' => 'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'size' => 'large', // null, 'large', 'small' or 'mini'
                'disabled' => true
            ));
            ?>
            <br/>
            Details of user that published the job 

            <?php echo CHtml::link($model->user->username, array('/user/profile')); ?>
            <br/>
            Sare the job posting on different social media 
            <br/><br/>
        </div> 
    </div>
</div>

<div class="success">
    <?php //echo Yii::app()->user->getFlash('success');     ?>
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
<p class="alert alert-info"><i class="icon-info-sign"></i> <?php echo $text; ?></p>
<div class="form-actions">
    <?php
    if ($partecipants == 0) {
        if ($model->user_id != Yii::app()->user->id && Yii::app()->getModule('user')->isEmployee() == 1) {
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'primary',
                'label' => 'Apply For Job',
                'icon' => 'icon-pushpin',
                'url' => array('apply', 'id_contract' => $model->id_employer_contract, 'id_employer' => $model->user_id),
                'loadingText' => 'loading...',
            ));
        }
    } else {
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'danger',
            'label' => 'Alreaddy Applied',
            'disabled' => true,
            'icon' => 'icon-warning-sign'
        ));
    }
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'reset',
        'icon' => 'remove',
        'label' => __('Back')
    ));
    ?><div class="pull-right">
        <?php
        echo CHtml::link('< Prev', "#", array(
            'class' => 'btn btn-success',
            'id' => 'b_prev',
            'style' => 'opacity: 1;float: left; display:none;'));

        echo CHtml::link('Next >', "#", array(
            'class' => 'btn btn-success',
            'id' => 'b_next',
            'style' => 'opacity: 1;float: left; margin-left: 10px;'));
        ?>
    </div>
</div>
<?php
Yii::app()->clientScript->registerScript(
        'link', '$(".success").animate({opacity: 1.0}, 4000).fadeOut("slow");', CClientScript::POS_READY
);
?>

<?php
if ($model->user_id == Yii::app()->user->id) {
    $this->renderPartial('details/applied', array('model' => $model));
}

$this->widget('ext.sharebox.EShareBox', array(
    // url to share, required.
    'url' => $this->createAbsoluteUrl('/'),
    // A title to describe your link, required.
    // Some services will ignore this value.
    'title' => 'SPOB',
        // Size of the icons to display, in pixels.
        // Default is 24px, available sizes : 16, 24, 32, 48.
        //'iconSize' => 32,
        // Whether to animate the links.
        // Default is true
        //'animate' => false,
        // Social networks to include, excluding all others.
        // The exclude filter is still run.
        //'include' => array('technorati', 'digg'),
        // Social networks to exclude from display.
        // By default none are excluded.
        //'exclude' => array('technorati', 'digg'),
        // Use your own icons! Note that you will need to have
        // a subfolder of the appropriate icons sizes.
        // ie: /myimages/social/16px /myimages/social/24px ...
        //'iconPath' => '/myimages/social',
        // HTML options for the UL element.
        //'ulHtmlOptions' => array('class' => 'myCustomUlClass'),
        // HTML options for all the LI elements.
        //'liHtmlOptions' => array('class' => 'myCustomLiClass'),
));
?>
