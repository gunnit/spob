<?php
$this->breadcrumbs=array(
	 __('List all jobs') => array('index'),
	'Create',
);

$this->menu=array(
	array(
            'label'=>__('List Jobs'),
            'icon'=>'icon-suitcase',
            'url'=>array('index')),
	array(
            'label'=>__('Search A Job'),
             'icon'=>'icon-search',
            'url'=>array('admin')),
);
?>
<div class="page-header">
  <h1><?php echo __('Create Job'); ?> <small><?php echo __('Fields with'); ?> <span class="required">*</span> <?php echo __('are required'); ?></small></h1>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>