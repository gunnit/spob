<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'job_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'employee_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'contractor_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'comment',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'creation_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'soft_skills',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'physical_skills',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'teamwork',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'leadership',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
