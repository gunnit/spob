<?php
/* @var $this UserfundsController */
/* @var $model UserFunds */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'funds'); ?>
		<?php echo $form->textField($model,'funds'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'block'); ?>
		<?php echo $form->textField($model,'block'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->