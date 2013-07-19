<?php
$this->pageTitle = Yii::app()->name . ' - ' . __("Profile");
$this->breadcrumbs = array(
    __("Profile"),
);
$this->menu = array(
    ((UserModule::isAdmin()) ? array(
        'label' => __('View Users'),
        'icon' => 'icon-cogs',
        'url' => array('/user/admin')) : array()),
    array(
        'label' => __('Edit'),
        'icon' => 'icon-wrench',
        'url' => array('edit')),
    array(
        'label' => __('Change password'),
        'icon' => 'icon-lock',
        'url' => array('changepassword')),
    array(
        'label' => __('Logout'),
        'icon' => 'icon-key',
        'url' => array('/user/logout')),
);
$user_id = Yii::app()->user->id;
$user_data = User::model()->findByPk($user_id);
if (isset($user_data) && $user_data->type == '0') {
    $main_title = __('Your profile (Contractor)');
    $jobs = 'Created Jobs';
    $money = 'Money Spent';
    $pending = 'Jobs Awaiting Approval';
    $second_main_title = 'Contractor';
    $second_sub_title = 'Contractor';
    $second_keyword = 'Contractor';
} else {
    $main_title = __('Your profile (Employee)');
    $jobs = 'Jobs Completed';
    $money = 'Money Earned';
    $pending = 'Jobs Applied For';
    $second_main_title = 'Employee';
    $second_sub_title = 'Employee';
    $second_keyword = 'Employee';
}
?>


<div class="row-fluid ">
    <h2 class="page-header"><?php echo $main_title; ?><small> Want to change jobs? Complete your <a href="#kyruus"><?php echo $second_keyword; ?></a>.</small></h2>
</div>


<?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
    </div>
<?php endif; ?>
<?php
//FIND USER PROFILE FIELDS 
$profile_filds = Profile::model()->findByPk($user_id);
//CHANGE TO DYNAMIC ------------------------------------------------------------------
$link = 'http://localhost/' . Yii::app()->request->baseUrl . '/' . $profile_filds->photo;
?>
<div class="row-fluid well">
    <div class="span3">
        <a class="thumbnail">
            <?php echo CHtml::image($link, "User Photo", array('class' => 'image_thumb')); ?>
        </a>
        <br/>
        <i rel="tooltip" title=<?php echo __("View Details");?> class=" icon-phone-sign icon-2x"></i>            
        <i rel="tooltip" title=<?php echo __("View Details");?> class="icon-facebook-sign icon-2x"></i>
        <i rel="tooltip" title=<?php echo __("View Details");?> class="icon-twitter-sign icon-2x"></i>
        <i rel="tooltip" title=<?php echo __("View Details");?> class="icon-linkedin-sign icon-2x"></i>
        <i rel="tooltip" title=<?php echo __("View Details");?> class="icon-google-plus-sign icon-2x"></i>
    </div>

    <div class="span8">
        <div class="row-fluid">
            <div class="span8">
                <h1><?php echo $profile_filds->name . ' ' . $profile_filds->last_name; ?></h1>
                <h3><?php echo $profile_filds->city; ?>, CA</h3>
                <h4><a href="http://spyrestudios.com/"><?php echo $model->email; ?></a></h4>

                <hr>
                <?php
                $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => 'primary',
                    'toggle' => 'radio', // 'checkbox' or 'radio'
                    'buttons' => array(
                        array('label' => $jobs),
                        array('label' => $money),
                        array('label' => $pending),
                    ),
                ));
                ?>
            </div>

            <div class="span4">  
                <blockquote>
                    <p><?php echo $profile_filds->about_me; ?></p>
                    <footer>— About Me "<?php echo $profile_filds->name . ' ' . $profile_filds->last_name; ?>"</footer>
                </blockquote>                
            </div>
        </div>

    </div>

</div>
<div class="row-fluid ">
    <h2 class="page-header"><?php echo $second_main_title ?><small><?php echo $second_sub_title; ?><a href="#kyruus"><?php echo $second_keyword; ?></a>.</small></h2>
</div>
<div class="row-fluid well">
    <table class="dataGrid">
        <tr>
            <th class="label"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></th>
            <td><?php echo CHtml::encode($model->username); ?></td>
        </tr>
        <?php
        $profileFields = ProfileField::model()->forOwner()->sort()->findAll();

        if ($profileFields) {
            foreach ($profileFields as $field) {
                //echo "<pre>"; print_r($profile); die();
                ?>
                <tr>
                    <th class="label"><?php echo CHtml::encode(__($field->title)); ?></th>
                    <td><?php echo (($field->widgetView($profile)) ? $field->widgetView($profile) : CHtml::encode((($field->range) ? Profile::range($field->range, $profile->getAttribute($field->varname)) : $profile->getAttribute($field->varname)))); ?></td>
                </tr>
                <?php
            }//$profile->getAttribute($field->varname)
        }
        ?>
        <tr>
            <th class="label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
            <td><?php echo CHtml::encode($model->email); ?></td>
        </tr>
        <tr>
            <th class="label"><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?></th>
            <td><?php echo $model->create_at; ?></td>
        </tr>
        <tr>
            <th class="label"><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?></th>
            <td><?php echo $model->lastvisit_at; ?></td>
        </tr>
        <tr>
            <th class="label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></th>
            <td><?php echo CHtml::encode(User::itemAlias("UserStatus", $model->status)); ?></td>
        </tr>
    </table>
</div>
<?php
//This is to register a script and serves to compress the project fiche
Yii::app()->clientScript->registerScript('hideDivs', "
            var max_size = 100;
            $('.image_thumb').each(function(i) {
                var h = max_size;
                var w = Math.ceil($(this).width() / $(this).height() * max_size);
                $(this).css({ height: h, width: w });
            });

            ");
?>