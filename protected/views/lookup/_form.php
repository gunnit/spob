<?php 

 $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'lookup-form',
    'enableAjaxValidation'=>false,
)); 
 
$tpye = CHtml::listData(Lookup::model()->findAll(), 'type', 'type');
 
 ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'name',array(
        'class'=>'span5',
        'maxlength'=>45, 
        'prepend'=>'<i class="icon-text-width"></i>',
        'hint'=>__('Use this text field to insert the name of the extra option')
        )); ?>

       <?php echo $form->labelEx($model, 'type'); ?>
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-th-list"></i></span>
                            <?php
                            echo $form->dropDownList($model, 'type', $tpye, array(
                                'data-placeholder' => __('Select a Type'),
                                'class' => 'input-large',));
                            ?>
                        </div>


    

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>$model->isNewRecord ? __('Create') : __('Save'),
        )); ?>
    </div>

<?php $this->endWidget(); ?>