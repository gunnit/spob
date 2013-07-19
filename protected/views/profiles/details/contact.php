
<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'label' => __('Add Funds'),
        'url'=>array('userfunds/update', 'id'=>$model->user_id)
    ));
?>