<?php
$this->pageTitle = Yii::app()->name . ' - ' . __("Login");
$this->breadcrumbs = array(
    __("Login"),
);
?>
<div class="page-header">
    <h1 ><?php echo __("Login"); ?> <small> <?php echo __('Find the right job for you'); ?></small></h1>
</div>
<?php if (Yii::app()->user->hasFlash('loginMessage')): ?>

    <div class="success">
        <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
    </div>

<?php endif; ?>

<p><?php echo __("Please fill out the following form with your login credentials:"); ?></p>

<div class="form well well-large well-transparent lead">
    <i class="icon-key icon-4x pull-left icon-muted"></i>

    <?php echo CHtml::beginForm(); ?>

    <p class="note"><?php echo __('Fields with <span class="required">*</span> are required.'); ?></p>

    <?php echo CHtml::errorSummary($model); ?>
    <div class="row-fluid">
        <div class="span3">
            <?php echo CHtml::activeLabelEx($model, 'username'); ?>
              <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
            <?php echo CHtml::activeTextField($model, 'username') ?>
              </div>
        </div>
        <div class="span3">
            <?php echo CHtml::activeLabelEx($model, 'password'); ?>
             <div class="input-prepend">
                <span class="add-on"><i class="icon-key"></i></span>
            <?php echo CHtml::activePasswordField($model, 'password') ?>
             </div>
        </div>
        <div class="span3">
            <div class="rememberMe">
                <?php echo CHtml::activeCheckBox($model, 'rememberMe'); ?>
                <?php echo CHtml::activeLabelEx($model, 'rememberMe'); ?>
            </div>
            <div class="submit">
                 <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'success',
                'icon' => 'ok white',
                'label' => __('Login'),
            ));
            ?>
            </div>
        </div>
    </div>   
    <div class="row-fluid">
        <div class="span6 offset1">
            <p class="hint">
                <?php echo CHtml::link(__("Register"), Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(__("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>
            </p>
        </div>
    </div>


    <?php echo CHtml::endForm(); ?>

</div><!-- form -->
<?php
$form = new CForm(array(
            'elements' => array(
                'username' => array(
                    'type' => 'text',
                    'maxlength' => 32,
                ),
                'password' => array(
                    'type' => 'password',
                    'maxlength' => 32,
                ),
                'rememberMe' => array(
                    'type' => 'checkbox',
                )
            ),
            'buttons' => array(
                'login' => array(
                    'type' => 'submit',
                    'label' => 'Login',
                ),
            ),
                ), $model);
?>