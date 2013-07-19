<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'employer-contract-form',
    'enableAjaxValidation' => true,
        ));

Yii::app()->clientScript->registerScript('toggle', "
    
 $(function(){
    //nascondi i campi Other

        //This is to hide the labels
        //COUNTRY
        $('#tipology_other').hide();
        $('#tipology option:selected').each(function () {
        if ($(this).text()=='Other'){
            $('#tipology_other').show();
            }
        });
        //Other Countlry
        $('#tipology').change(function() { 
        if(
        // $('#tipology').find('option[stato=\"Other\"]').attr('selected')=='selected'
        $('#tipology').find('option[value=\"2\"]').attr('selected')=='selected'){
        $('#tipology_other').show();
        }else{
        $('#tipology_other').hide();
        }
        });
    });     
 
    $('#b_prev').click(function(){
        var index=parseInt($('#yw40 li.active a').attr('href').substring(10));
        var index_2=index-2;
        var index_1=index-1;
        
        $('#yw40 li.active').removeClass('active');
        $('#yw40 > li:eq('+index_2+')').addClass('active');
        $('#yw39_tab_'+index).removeClass('active').removeClass('in');
        $('#yw39_tab_'+index_1).addClass('active').addClass('in');
        
        if (index==2) $('#b_prev').hide();
        if (index==4) $('#b_next').show();
        
        return false;
    });
    
    $('#b_next').click(function(){
        var index=parseInt($('#yw40 li.active a').attr('href').substring(10));
        if (index==4) return false;
        var index_1=index+1;
        
        $('#yw40 li.active').removeClass('active');
        $('#yw40 > li:eq('+index+')').addClass('active');
        $('#yw39_tab_'+index).removeClass('active').removeClass('in');
        $('#yw39_tab_'+index_1).addClass('active').addClass('in');
        
        if (index==3) $('#b_next').hide();
        if (index==1) $('#b_prev').show();
        
        return false;
    });
    
    $('#yw40 > li a').click(function(){
        var index=parseInt($(this).attr('href').substring(4));
        
        if (index==4){
            $('#b_next').hide();
        }
        else{
            $('#b_next').show();
        }
            
        if (index==1){
            $('#b_prev').hide();
        }
        else{
            $('#b_prev').show();
        }
    });
    
    ");
$typologys = CHtml::listData(Lookup::model()->findAll('type="tipology"'), 'code', 'name');
$country = CHtml::listData(Lookup::model()->findAll('type="country"'), 'code', 'name');
$option = CHtml::listData(Lookup::model()->findAll('type="option"'), 'code', 'name');
$indoors = CHtml::listData(Lookup::model()->findAll('type="indoors"'), 'code', 'name');
$day_period = CHtml::listData(Lookup::model()->findAll('type="day_period"'), 'code', 'name');

Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
?>



<?php echo $form->errorSummary($model); ?>

<div class="togglable-tabs tabs-left" id="yw39">
    <ul id="yw40" class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#yw39_tab_1"><?php echo __('Job Details'); ?></a>
        </li>

        <li>
            <a data-toggle="tab" href="#yw39_tab_2"><?php echo __('Date & Time'); ?></a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw39_tab_3"><?php echo __('Location'); ?></a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw39_tab_4"><?php echo __('Details'); ?></a>
        </li>

    </ul>
    <div class="tab-content" >
        <div id="yw39_tab_1" class="tab-pane fade active in" >

            <div class="control-group success">
                <?php
                echo $form->textFieldRow($model, 'title', array(
                    'hint' => __('The name or title of the job being inserted'),
                    'class' => 'span6',
                    'prepend' => '<i class="icon-lightbulb"></i>',
                    'maxlength' => 255,
                ));
                ?>
                <div class="row-fluid">
                    <div class="span6">
                        <?php echo $form->labelEx($model, 'tipology'); ?>
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-th-list"></i></span>
                            <?php
                            echo $form->dropDownList($model, 'tipology', $typologys, array(
                                'data-placeholder' => __('Select a Job Type'),
                                'class' => 'input-large',
                                'id' => 'tipology'));
                            ?>
                        </div>
                        <p class="help-block"><?php echo __('Select the job category'); ?></p>
                        <?php echo $form->textField($model, 'other_tipology', array(
                            'id' => 'tipology_other',));
                        ?>
                    </div>
                    <div class="span6">
                        <?php
                        echo $form->textFieldRow($model, 'cost', array(
                            'class' => 'input-large',
                            'hint' => __('How much are you willing to pay'),
                            'prepend' => '€',
                            'append' => '.00'));
                        ?>
                    </div>
                </div>  

<?php echo $form->textAreaRow($model, 'description', array('hint' => __('Describe what the job consists of. Do not omit any information the user might need'), 'class' => 'span7', 'maxlength' => 255)); ?>


            </div><!-- CLOSE THE GREEN COLOR-->

        </div>

        <div id="yw39_tab_2" class="tab-pane fade" > 
            <div class="control-group info">
                <div class="row-fluid">
                    <div class="span6">
                        <?php echo $form->labelEx($model, 'start_date'); ?>
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-calendar"></i></span>
                            <?php
                            $this->widget('CJuiDateTimePicker', array(
                                'model' => $model, //Model object
                                'attribute' => 'start_date', //attribute name
                                'mode' => 'datetime', //use "time","date" or "datetime" (default)
                                'options' => array("dateFormat" => 'yy/mm/dd'), // jquery plugin options
                                'language' => '',
                                'htmlOptions' => array('class' => 'span7'),
                            ));
                            ?>
                        </div>
                        <p class="help-block"><?php echo __('Starting Date and Starting time of the job'); ?></p>
                    </div>
                    <div class="span6">
                        <?php echo $form->labelEx($model, 'end_date'); ?>
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-calendar"></i></span>
                            <?php
                            $this->widget('CJuiDateTimePicker', array(
                                'model' => $model, //Model object
                                'attribute' => 'end_date', //attribute name
                                'mode' => 'datetime', //use "time","date" or "datetime" (default)
                                'options' => array("dateFormat" => 'yy/mm/dd'), // jquery plugin options
                                'language' => '',
                                'htmlOptions' => array('class' => 'span7'),
                            ));
                            ?>
                        </div>
                        <p class="help-block"><?php echo __('Ending Date and Ending time of the job'); ?></p>
                    </div>
                </div>     


                    <?php echo $form->labelEx($model, 'day_period'); ?>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-screenshot"></i></span>
                    <?php
                    echo $form->dropDownList($model, 'day_period', $day_period, array(
                        'data-placeholder' => __('Select a Day Period'),
                        'class' => 'input-large'));
                    ?>
                </div>
                <p class="help-block"><?php echo __('If the job dose not have a specific time selct a day period'); ?></p>


            </div>
        </div>
        <div id="yw39_tab_3" class="tab-pane fade" > 
            <div class="control-group warning">

                <?php echo $form->labelEx($model, 'country'); ?>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-globe"></i></span>
                    <?php
                    echo $form->dropDownList($model, 'country', $country, array(
                        'data-placeholder' => __('Select a Country'),
                        'class' => 'input-large',));
                    ?>
                </div>

                <?php echo $form->labelEx($model, 'city'); ?>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lightbulb"></i></span>
                    <?php
                    $this->widget('bootstrap.widgets.TbTypeahead', array(
                        'model' => $model, // INSTANCE OF MODEL 'User'
                        'attribute' => 'city', // ATTRIBUTE
                        'options' => array(
                            'name' => 'city',
                            'source' => array(
                                'Agrigento', 'Alessandria', 'Ancona', 'Aosta', 'Aquila', 'Arezzo', 'Ascoli
                        Piceno', 'Asti', 'Avellino', 'Bari', 'Belluno', 'Benevento', 'Bergamo', 'Biella', 'Bologna', 'Bolzano', 'Brescia', 'Brindisi',
                                'Cagliari', 'Caltanissetta', 'Campobasso', 'Caserta', 'Catania', 'Catanzaro', 'Chieti', 'Como',
                                'Cosenza', 'Cremona', 'Crotone', 'Cuneo', 'Enna', 'Ferrara', 'Firenze', 'Foggia', 'Forlì e Cesena', 'Frosinone',
                                'Genova', 'Gorizia', 'Grosseto', 'Imperia', 'Isernia', 'La Spezia', 'Latina', 'Lecce', 'Lecco', 'Livorno', 'Lodi', 'Lucca',
                                'Macerata', 'Mantova', 'Massa-Carrara', 'Matera', 'Messina', 'Milano', 'Modena',
                                'Napoli', 'Novara', 'Nuoro', 'Oristano', 'Padova', 'Palermo', 'Parma', 'Pavia', 'Perugia', 'Pesaro e
                        Urbino', 'Pescara', 'Piacenza', 'Pisa', 'Pistoia', 'Pordenone', 'Potenza', 'Prato', 'Ragusa', 'Ravenna', 'Reggio Calabria', 'Reggio Emilia', 'Rieti', 'Rimini', 'Roma', 'Rovigo',
                                'Salerno', 'Sassari', 'Savona', 'Siena', 'Siracusa', 'Sondrio',
                                'Taranto', 'Teramo', 'Terni', 'Torino', 'Trapani', 'Trento', 'Treviso', 'Trieste',
                                'Udine', 'Varese', 'Venezia', 'Verbano-Cusio-Ossola', 'Vercelli', 'Verona', 'Vibo  Valentia', 'Vicenza', 'Viterbo'),
                            'items' => 4,
                            'matcher' => "js:function(item) {return ~item.toLowerCase().indexOf(this.query.toLowerCase());}",
                        ),
                        'htmlOptions' => array(
                            'class' => 'span5',
                        //'placeholder' => __("City")
                        ),
                    ));
                    ?>

                </div>

                <?php
                echo $form->textFieldRow($model, 'state', array(
                    'class' => 'span5',
                    'prepend' => '<i class="icon-lightbulb"></i>',
                    'icon' => 'map-marker',
                    //'placeholder'=>__('State or Region'),
                    'maxlength' => 45));
                ?>

                <?php
                echo $form->textFieldRow($model, 'street', array(
                    'class' => 'span5',
                    'prepend' => '<i class="icon-lightbulb"></i>',
                    'icon' => 'map-marker',
                    'maxlength' => 45));
                ?>

                <?php
                echo $form->textFieldRow($model, 'cap', array(
                    'class' => 'span5',
                    'prepend' => '<i class="icon-lightbulb"></i>',
                    'icon' => 'map-marker',
                    'maxlength' => 45));
                ?>
            </div>
        </div>
        <div id="yw39_tab_4" class="tab-pane fade" > 
            <div class="alert alert-info">
                <i class="icon-info-sign"></i> 
                <?php echo __('Use the options below to descripe the job in further
        detail and therefore make it easier for possible employees to find it'); ?> 
            </div>
            <div class="control-group error">
<?php echo $form->labelEx($model, 'indoors'); ?>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-globe"></i></span>
                    <?php
                    echo $form->dropDownList($model, 'indoors', $indoors);
                    ?>
                </div>
                <p class="help-block"><?php echo __('Where is the job going to take place'); ?></p>
<?php echo $form->labelEx($model, 'customer_facing'); ?>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-globe"></i></span>
                    <?php echo $form->dropDownList($model, 'customer_facing', $option);
                    ?>
                </div>
                <p class="help-block"><?php echo __('Is the job going to have direct contact withc sutomers'); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'reset',
        'icon' => 'remove',
        'label' => __('Reset')
    ));
    ?><div class="pull-right">
        <?php
        echo CHtml::link('< Prev', "#", array(
            'class' => 'btn btn-success',
            'id' => 'b_prev',
            'style' => 'opacity: 1;float: left; display:none;'));

        echo CHtml::link('Next >', "#", array(
            'class' => 'btn btn-success',
            'id' => 'b_next',
            'style' => 'opacity: 1;float: left; margin-left: 10px;'));
        ?>
    </div>
</div>

<?php $this->endWidget(); ?>

<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl . '/js/counter/jquery.jqEasyCharCounter.min.js');
//in your view where you want to include JavaScripts

$cs->registerScript('indicators', "$('#EmployerContract_description').jqEasyCounter({
    'maxChars': 255,
    'maxCharsWarning': 200,
    'msgFontSize': '12px',
    'msgFontColor': '#000',
    'msgFontFamily': 'Arial',
    'msgTextAlign': 'left',
    'msgWarningColor': '#F00',
    'msgAppendMethod': 'insertBefore'              
});
", CClientScript::POS_END
);
?>
