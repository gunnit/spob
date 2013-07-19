<?php
$this->pageTitle = Yii::app()->name . ' - ' . __("Restore");
$this->breadcrumbs = array(
    __("Login") => array('/user/login'),
    __("Restore"),
);
?>

<div class="page-header">
    <h1 ><?php echo __("Restore"); ?> <small> <?php echo __('Retrive your Login credentials'); ?></small></h1>
</div>
<?php if (Yii::app()->user->hasFlash('recoveryMessage')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
    </div>
<?php else: ?>

    <div class="form well well-large well-transparent lead">
        <?php echo CHtml::beginForm(); ?>

        <?php echo CHtml::errorSummary($form); ?>


        <?php echo CHtml::activeLabel($form, 'login_or_email'); ?>
        <div class="input-prepend">
            <span class="add-on"><i class="icon-info-sign"></i></span>
            <?php echo CHtml::activeTextField($form, 'login_or_email') ?>
        </div>
        <p class="hint">
            <?php echo __("Please enter your login or email addres."); ?>
        </p>
        <div class="submit">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'null',
                'label' => __('Restore'),
            ));
            ?>

        </div>

        <?php echo CHtml::endForm(); ?>
    </div><!-- form -->
<?php endif; ?>