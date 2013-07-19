<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bridge_contract')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bridge_contract),array('view','id'=>$data->id_bridge_contract)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_employer_contract')); ?>:</b>
	<?php echo CHtml::encode($data->id_employer_contract); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approved')); ?>:</b>
	<?php echo CHtml::encode($data->approved); ?>
	<br />


</div>