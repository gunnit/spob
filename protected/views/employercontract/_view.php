
<div class="row view">
    <div class="span5">
  <?php
    $partecipants = BridgeContract::model()->count(array(
    'condition' => 'id_employer_contract=:id_employer_contract',
    'params' => array(
        ':id_employer_contract' => $data->id_employer_contract,
    )
        ));
    ?>

        <?php echo CHtml::link(CHtml::encode($data->title), array('employercontract/view', 'id' => $data->id_employer_contract), array('rel' => "tooltip", 'title' => __("View Details"))); ?>
        <br />
        <?php echo CHtml::encode($data->description); ?>
        <br />
    </div>
    <div class="span5">
        <address>
            <strong><?php echo CHtml::encode($data->start_date); ?></strong><br>


            <b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
            <?php echo CHtml::encode($data->end_date); ?>
            <br />
            <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
            <?php echo CHtml::encode($data->user_id); ?>
            <br />
            <b><?php echo CHtml::encode($data->getAttributeLabel('cost')); ?>:</b>
            <?php echo CHtml::encode($data->cost); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('cost_description')); ?>:</b>
            <?php echo CHtml::encode($data->cost_description); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('tipology')); ?>:</b>
            <?php echo CHtml::encode(Lookup::item('tipology', $data->tipology)); ?> 
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
            <?php echo CHtml::encode($data->creation_date); ?>
            <br />




            <!-- <abbr title="Phone">Tel:</abbr> --><?php // echo CHtml::encode($data->tel);   ?>
        </address>


    </div>
    <div class="span2">

        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'primary',
            'icon' => 'icon-plus',
            'url' => array('employercontract/view', 'id' => $data->id_employer_contract),
            'htmlOptions' => array('rel' => "tooltip", 'title' => __("Open")),
        ));
        ?>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'button',
            'type' => 'null',
            'icon' => 'icon-bullhorn',
            'htmlOptions' => array('class' => 'toggleDetails', 'rel' => "tooltip", 'title' => __("View Details"), 'data-id' => $data->id_employer_contract),
        ));
        ?>
        <?php
        if ($data->status == 0) {
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'success',
                'icon' => 'icon-plus',
                'url' => array('employercontract/approve', 'id'=>$data->id_employer_contract),
                'htmlOptions' => array('rel' => "tooltip", 'title' => __("Approve")),
            ));
        }else{ ?>
             <i class="icon-check icon-2x"></i>
       <?php }
        ?>
        <hr/>
        <div class="date" style="line-height: 1;">
            <a href="#" rel="tooltip" style="text-decoration: none;" data-original-title="Publication Date">
                <p>
                    <?php
                    $dates_day_created = Yii::app()->dateFormatter->format("dd", $data->creation_date);
                    $dates_month_created = Yii::app()->dateFormatter->format("MMM", $data->creation_date);
                    echo $dates_day_created;
                    ?>
                    <span><?php echo $dates_month_created; ?></span>
                </p>
            </a>           
        </div>
    </div>

</div>
<div class="row-fluid closed" id="detailsDiv-<?php echo $data->id_employer_contract; ?>" style="background-color: #ccccff">
    <b><?php echo CHtml::encode($data->getAttributeLabel('id_location')); ?>:</b>
<?php echo CHtml::encode($data->id_location); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('public')); ?>:</b>
<?php echo CHtml::encode(Lookup::item('option', $data->public)); ?> 
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
<?php echo CHtml::encode($data->update_date); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('indoors')); ?>:</b>
<?php echo CHtml::encode(Lookup::item('indoors', $data->indoors)); ?> 
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('customer_facing')); ?>:</b>
<?php echo CHtml::encode(Lookup::item('option', $data->customer_facing)); ?> 
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('day_period')); ?>:</b>        
<?php echo CHtml::encode(Lookup::item('day_period', $data->day_period)); ?> 
    <br />
</div>	
   <b><?php echo __('Applied for this job :').(int)$partecipants; ?></b>
  
<div class="scissorz"></div>