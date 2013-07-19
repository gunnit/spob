<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'social-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'facebook',array('class'=>'span5','maxlength'=>445)); ?>

	<?php echo $form->textFieldRow($model,'twitter',array('class'=>'span5','maxlength'=>445)); ?>

	<?php echo $form->textFieldRow($model,'linkedin',array('class'=>'span5','maxlength'=>445)); ?>

	<?php echo $form->textFieldRow($model,'google',array('class'=>'span5','maxlength'=>445)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
