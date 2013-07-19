<?php
/* @var $this UserfundsController */
/* @var $data UserFunds */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_user), array('view', 'id'=>$data->id_user)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('funds')); ?>:</b>
	<?php echo CHtml::encode($data->funds); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('block')); ?>:</b>
	<?php echo CHtml::encode($data->block); ?>
	<br />


</div>