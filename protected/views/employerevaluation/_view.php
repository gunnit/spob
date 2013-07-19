<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('job_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->job_id),array('view','id'=>$data->job_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contractor_id')); ?>:</b>
	<?php echo CHtml::encode($data->contractor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('soft_skills')); ?>:</b>
	<?php echo CHtml::encode($data->soft_skills); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('physical_skills')); ?>:</b>
	<?php echo CHtml::encode($data->physical_skills); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('teamwork')); ?>:</b>
	<?php echo CHtml::encode($data->teamwork); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leadership')); ?>:</b>
	<?php echo CHtml::encode($data->leadership); ?>
	<br />

	*/ ?>

</div>