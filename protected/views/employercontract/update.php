<?php
$this->breadcrumbs = array(
     __('List all jobs') => array('index'),
    $model->title => array('view', 'id' => $model->id_employer_contract),
    'Update',
);

$this->menu = array(
    array(
        'label' => __('List Jobs'),
        'icon' => 'icon-suitcase',
        'url' => array('index')),
    array(
        'label' => __('Search A Job'),
        'icon' => 'icon-search',
        'url' => array('admin')),
    ((!Yii::app()->getModule('user')->isEmployee()) ? array(
        'label' => __('Create New Job'),
        'icon' => 'icon-pencil',
        'url' => array('create')) : array()),
    ((!Yii::app()->getModule('user')->isEmployee()) ? array(
        'label' => __('View Job'),
        'icon' => 'icon-eye-open',
        'url' => array(
            'view', 'id' => $model->id_employer_contract)) : array()),
);
?>

<div class="page-header">
  <h1><?php echo __('Update Job'); ?> <small><?php echo __('Fields with'); ?> <span class="required">*</span> <?php echo __('are required'); ?></small></h1>
</div>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>