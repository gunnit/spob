<?php Yii::app()->clientScript->registerScript('toggleDetails', "
    $('.closed').hide();
    $('.toggleDetails').click(function(e){
        var id = $(this).data('id');
        $('#detailsDiv-' + id).slideToggle();
        e.preventDefault();
    });
", CClientScript::POS_READY) ?>
<div class="page-header">
    <h1 ><?php echo __('List of My Jobs'); ?> <small> <?php echo __('Pending / Approved'); ?></small></h1>
</div>

<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'label' => __('Create a Job'),
        'url'=>array('employercontract/create')
    ));
?>
<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '../employercontract/_view',
));
?>
