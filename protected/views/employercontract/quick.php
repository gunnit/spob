<?php
$this->pageTitle = Yii::app()->name . __(' - Contact Us');
$this->breadcrumbs = array(
    __('List all jobs') => array('index'),
    __('Quick Search') => array(''),
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
);
//get the search parameter from the index page
$q = $_GET['q'];
//set the hide details from the job
Yii::app()->clientScript->registerScript('toggleDetails', "
    $('.closed').hide();
    $('.toggleDetails').click(function(e){
        var id = $(this).data('id');
        $('#detailsDiv-' + id).slideToggle();
        e.preventDefault();
    });
", CClientScript::POS_READY) ?>
<div class="page-header">
    <h1 ><?php echo __('Quick Job Search'); ?># <small> <?php echo $q; ?></small></h1>
</div>
<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
