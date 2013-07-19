<?php
/* @var $this ProfilesController */
/* @var $model Profiles */

$this->breadcrumbs=array(
	__('Job List')=>array('employercontract/index'),
	$model->name=>array('profile'),
	__('Update'),
);

?>

<div class="page-header">
  <h1><?php echo __('Update Employee Profile'); ?> <small><?php echo __('Fields with'); ?> <span class="required">*</span> <?php echo __('are required'); ?></small></h1>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

