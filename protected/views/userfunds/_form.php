<?php
/* @var $this UserfundsController */
/* @var $model UserFunds */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-funds-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'funds'); ?>
		<?php echo $form->textField($model,'funds'); ?>
		<?php echo $form->error($model,'funds'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'block'); ?>
		<?php echo $form->textField($model,'block'); ?>
		<?php echo $form->error($model,'block'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->