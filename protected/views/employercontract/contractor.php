<?php
$this->breadcrumbs = array(
    __('List all jobs') => array('index'),
    __('My Jobs'),
);

$this->menu = array(
    ((!Yii::app()->getModule('user')->isEmployee()) ? array(
        'label' => __('Create New Job'),
        'icon' => 'icon-pencil',
        'url' => array('create')) : array()),
    array(
        'label' => __('List Jobs'),
        'icon' => 'icon-suitcase',
        'url' => array('index')),    
    array(
        'label' => __('Search A Job'),
        'icon' => 'icon-search',
        'url' => array('admin')),
);
?>
<?php Yii::app()->clientScript->registerScript('toggleDetails', "
    $('.closed').hide();
    $('.toggleDetails').click(function(e){
        var id = $(this).data('id');
        $('#detailsDiv-' + id).slideToggle();
        e.preventDefault();
    });
", CClientScript::POS_READY) ?>
<div class="page-header">
    <h1 ><?php echo __('List of My Jobs'); ?> <small> <?php echo __('Approved and Pending '); ?></small></h1>
</div>
<div class="alert alert-info">
        <i class="icon-info-sign"></i> 
        Only jobs that are approved and that have not been 
        outdated(job start date is bigger than current date).
      </div>
<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
