<?php
$this->pageTitle = Yii::app()->name . ' - ' . __("Registration");
$this->breadcrumbs = array(
    __("Registration"),
);
?>

<div class="page-header">
    <h1 ><?php echo __("Registration"); ?> <small> <?php echo __('Find the right job for you'); ?></small></h1>
</div>
<?php if (Yii::app()->user->hasFlash('registration')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('registration'); ?>
    </div>
<?php else: ?>

    <div class="form control-group success">
        <?php
        $form = $this->beginWidget('UActiveForm', array(
            'id' => 'registration-form',
            'enableAjaxValidation' => true,
            'disableAjaxValidationAttributes' => array('RegistrationForm_verifyCode'),
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
                ));
        ?>

        <p class="note">
            <?php echo __('Fields with <span class="required">*</span> are required.'); ?>
        </p>

        <?php echo $form->errorSummary(array($model, $profile)); ?>

        <div class="row">
            <?php echo $form->labelEx($model, 'username'); ?>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <?php echo $form->textField($model, 'username'); ?>
                <?php echo $form->error($model, 'username'); ?>
            </div>
            <p class="help-block"><?php echo __('Select a contact person from the dropdown list.'); ?></p>
        </div>


        <div class="row">
            <?php echo $form->labelEx($model, 'password'); ?>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-key"></i></span>
                <?php echo $form->passwordField($model, 'password'); ?>
                <?php echo $form->error($model, 'password'); ?>
            </div>
            <p class="help-block"><?php echo __('Minimal password length 4 symbols.'); ?></p>
        </div>


        <div class="row">
            <?php echo $form->labelEx($model, 'verifyPassword'); ?>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-key"></i></span>
                <?php echo $form->passwordField($model, 'verifyPassword'); ?>
                <?php echo $form->error($model, 'verifyPassword'); ?>
            </div>
            <p class="help-block"><?php echo __('Confirm your password.'); ?></p>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'email'); ?>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span>
                <?php echo $form->textField($model, 'email'); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
            <p class="help-block"><?php echo __('Confirm your password.'); ?></p>
        </div>

        <?php
        $profileFields = $profile->getFields();
        if ($profileFields) {
            foreach ($profileFields as $field) {
                ?>
                <div class="row">
                    <?php echo $form->labelEx($profile, $field->varname); ?>
                    <div class="input-prepend">
                <span class="add-on"><i class="icon-legal"></i></span>
                    <?php
                    if ($widgetEdit = $field->widgetEdit($profile)) {
                        echo $widgetEdit;
                    } elseif ($field->range) {
                        echo $form->dropDownList($profile, $field->varname, Profile::range($field->range));
                    } elseif ($field->field_type == "TEXT") {
                        echo$form->textArea($profile, $field->varname, array('rows' => 6, 'cols' => 50));
                    } else {
                        echo $form->textField($profile, $field->varname, array('size' => 60, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
                    }
                    ?>
                    <?php echo $form->error($profile, $field->varname); ?>
                </div>	
                </div>	
                <?php
            }
        }
        ?>
        <?php if (UserModule::doCaptcha('registration')): ?>
            <div class="row">
                <?php echo $form->labelEx($model, 'verifyCode'); ?>

                <?php $this->widget('CCaptcha'); ?>
                  <div class="input-prepend">
                <span class="add-on"><i class="icon-bullhorn"></i></span>
                <?php echo $form->textField($model, 'verifyCode'); ?>
                <?php echo $form->error($model, 'verifyCode'); ?>
                  </div>
                <p class="hint"><?php echo __("Please enter the letters as they are shown in the image above."); ?>
                    <br/><?php echo __("Letters are not case-sensitive."); ?></p>
            </div>
        <?php endif; ?>

        <div class="row submit">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'icon' => 'edit white',
                'label' => __('Register'),
            ));
            ?>
        </div>

        <?php $this->endWidget(); ?>
    </div><!-- form -->
<?php endif; ?>