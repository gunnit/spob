<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_lookup')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_lookup),array('view','id'=>$data->id_lookup)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />


</div>