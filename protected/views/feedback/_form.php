<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'feedback-form',
    'enableAjaxValidation' => false,
        ));
$feedback = CHtml::listData(Lookup::model()->findAll('type="feedback"'), 'code', 'name');
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'page_link', array(
    'class' => 'span5',
    'maxlength' => 455,
    'hint'=>'Paste the link of the page')); 

     echo $form->textAreaRow($model, 'description', array(
    'class' => 'span5',
    'maxlength' => 455,
    'hint'=>'Provide a clear and cohesive description')); 

    echo $form->dropDownListRow($model, 'status', $feedback, array(
    'data-placeholder' => __('Issue Status'),
    'class' => 'input-large',));
?>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
