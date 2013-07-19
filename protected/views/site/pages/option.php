<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . __(' - Register');
$this->breadcrumbs = array(
    __('Register'),
);
?>
<div class="jumbotron jumbotron-ad hidden-print">
    <div class="container">
        <h1><i class="icon-bullseye icon-large main_icon"></i>&nbsp; <?php echo __('Register') ?></h1>
        <p><?php echo __('Choose your account type'); ?></p>
    </div>
</div>

<div id="social-buttons" class="hidden-print">
    <div class="container">
        <ul class="unstyled inline">
            <li>
                <iframe class="github-btn" 
                        src="" 
                        allowtransparency="true" 
                        frameborder="0" 
                        scrolling="0" 
                        width="100px" 
                        height="20px"></iframe>
            </li>
            <li>
                <iframe class="github-btn" 
                        src="" 
                        allowtransparency="true" 
                        frameborder="0" 
                        scrolling="0" 
                        width="102px" 
                        height="20px"></iframe>
            </li>
            <li class="follow-btn">
                <a href="https://twitter.com/getspob" 
                   class="twitter-follow-button" 
                   data-link-color="#0069D6" 
                   data-show-count="true">Follow @spob</a>
            </li>
            <li class="tweet-btn">
                <a href="https://twitter.com/share" 
                   class="twitter-share-button" 
                   data-url="http://getspob.com" 
                   data-text="SPOB, Find a job do it fast" 
                   data-counturl="#" 
                   data-count="horizontal" 
                   data-via="fontawesome" 
                   data-related="njunju:Creator of SPOB">Tweet</a>
            </li>
        </ul>
    </div>
</div>
<div class="alert alert-info">
    <i class="icon-info-sign icon-2x pull-left margin-top-small padding-right-small"></i>
    <?php echo __('If you create an account as an employee and you wish to post jobs please contact us and we will enable your account'); ?>.
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span6">
                <div class="caption">
                    <div class="well">      
                        <div class="row-fluid">
                            <div class="span6">
                                <?php echo CHtml::image(Yii::app()->request->baseUrl . "/images/resgister/employer.png", "Employer Login", array('class' => 'image_thumb')); ?>
                            </div>
                            <div class="span6">
                                <h4><?php echo __('Register As Employer'); ?></h4>
                                <p>
                                    <?php echo __('Do you have some work to be done? 
                        Aare you havoing problems finding the right people for the job you need done?
                        Aare you a company or an individual that needs help with a job?'); ?>

                                <p/>
                            </div>
                            <?php
                            $this->widget('bootstrap.widgets.TbButton', array(
                                'label' => __('Register Employer'),
                                'icon' => 'user',
                                'type' => 'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                'size' => 'large', // null, 'large', 'small' or 'mini'
                                'url' => Yii::app()->getModule('user')->registrationUrl,
                                'htmlOptions' => array(
                                    'data-toggle' => 'modal',
                                    'data-target' => '#myModal',
                                ),
                            ));
                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="span6">
                <div class="caption">
                    <div class="well">
                        <div class="row-fluid">
                            <div class="span6">
                                <?php echo CHtml::image(Yii::app()->request->baseUrl . "/images/resgister/employee.png", "Employee Login", array('class' => 'image_thumb')); ?>
                            </div><div class="span6">

                                <h4><?php echo __("Register As Employee"); ?></h4>
                                <p>
                                    <?php echo __("Do you have some free time for what you wish to get some cash ? 
                            Do you simply need some easy money? Aare you looking to find a new paied activity? Or more simply do you need a quick job? "); ?>
                                </p>
                            </div>
                            <?php
                            $this->widget('bootstrap.widgets.TbButton', array(
                                'label' => _('Register Employee'),
                                'icon' => 'user',
                                'type' => 'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                'size' => 'large', // null, 'large', 'small' or 'mini'
                                'url' => Yii::app()->getModule('user')->registrationUrl,
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'myModal')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4><?php echo __('Register As:') ?></h4>
</div>

<div class="modal-body">
    <div class="row-fluid">
        <div class="span6">
            <?php echo CHtml::image(Yii::app()->request->baseUrl . "/images/resgister/home.png", "Employee Login", array('class' => 'image_thumb')); ?>
        </div><div class="span6">
            <br/>
            <h4><?php echo __("Register As Individual"); ?></h4>
            <p>
                <?php echo __("If you are an individual that needs
                    help and you wish to post a job register as an individual."); ?>
            </p>
            <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => _('Register Individual'),
            'icon' => 'user',
            'type' => 'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size' => 'large', // null, 'large', 'small' or 'mini'
            'url' => Yii::app()->getModule('user')->registrationUrl,
        ));
        ?>
        </div>
        
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?php echo CHtml::image(Yii::app()->request->baseUrl . "/images/resgister/agency.png", "Employee Login", array('class' => 'image_thumb')); ?>
        </div><div class="span6">
            <br/>
            <h4><?php echo __("Register As Company"); ?></h4>
            <p>
                <?php echo __("If you are a company/agency or any other kind
                    of legitimate buiness register as a company."); ?>
            </p>
             <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => _('Register Company'),
            'icon' => 'user',
            'type' => 'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size' => 'large', // null, 'large', 'small' or 'mini'
            'url' => Yii::app()->getModule('user')->registrationUrl,
        ));
        ?>
        </div>
       
    </div>
</div>

<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'label' => __('Close'),
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => __('F.A.Q.'),
        'url' => array('/site/page', 'view' => 'faq'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
	