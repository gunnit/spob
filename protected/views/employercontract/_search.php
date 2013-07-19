<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>


<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textFieldRow($model, 'cost', array('class' => 'span5')); ?>

<?php echo $form->labelEx($model, 'tipology'); ?>
<div class="input-prepend">
    <span class="add-on"><i class="icon-globe"></i></span>           
    <?php
    echo $form->dropDownList($model, 'tipology', CHtml::listData(Lookup::model()->findAll('type="tipology"'), 'code', 'name'), array(
        'empty' => __('-- Select a Tipology--'),
        'class' => 'span5'));
    ?>
</div>


<?php echo $form->textFieldRow($model, 'creation_date', array('class' => 'span5')); ?>

<?php
echo $form->daterangeRow($model, 'start_date', array(
    'hint' => __('Search for the starting date of the job: use the select box to select a date range.'),
    'class' => 'span5',
    'readonly' => 'readonly',
    'prepend' => '<i class="icon-calendar"></i>'));
?>

<?php
echo $form->daterangeRow($model, 'end_date', array(
    'hint' => __('Search for the ending date of the job: use the select box to select a date range.'),
    'class' => 'span5',
    'readonly' => 'readonly',
    'prepend' => '<i class="icon-calendar"></i>'));
?>

<?php echo $form->textFieldRow($model, 'user_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'id_location', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'public', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'update_date', array('class' => 'span5')); ?>

    <?php echo $form->labelEx($model, 'indoors'); ?>
<div class="input-prepend">
    <span class="add-on"><i class="icon-globe"></i></span>           
    <?php
    echo $form->dropDownList($model, 'indoors', CHtml::listData(Lookup::model()->findAll('type="indoors"'), 'code', 'name'), array(
        'empty' => __('-- Select a Job Profile--'),
        'class' => 'span5'));
    ?>
</div>

    <?php echo $form->labelEx($model, 'customer_facing'); ?>
<div class="input-prepend">
    <span class="add-on"><i class="icon-globe"></i></span>           
    <?php
    echo $form->dropDownList($model, 'customer_facing', CHtml::listData(Lookup::model()->findAll('type="option"'), 'code', 'name'), array(
        'empty' => __('-- Select a Job Profile--'),
        'class' => 'span5'));
    ?>
</div>

    <?php echo $form->labelEx($model, 'day_period'); ?>
<div class="input-prepend">
    <span class="add-on"><i class="icon-globe"></i></span>           
    <?php
    echo $form->dropDownList($model, 'day_period', CHtml::listData(Lookup::model()->findAll('type="day_period"'), 'code', 'name'), array(
        'empty' => __('-- Select a Day Period--'),
        'class' => 'span5'));
    ?>
</div>



<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
