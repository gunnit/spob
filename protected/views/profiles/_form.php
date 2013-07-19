<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'profiles-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));

$country = CHtml::listData(Lookup::model()->findAll('type="country"'), 'code', 'name');
$gender = CHtml::listData(Lookup::model()->findAll('type="gender"'), 'code', 'name');
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p> 
<?php echo $form->errorSummary($model); ?>
<div class="togglable-tabs tabs-left" id="yw1">
    <ul id="yw40" class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#yw1_tab_1"><?php echo __('Profile'); ?></a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw1_tab_2"><?php echo __('Know How'); ?></a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw1_tab_3"><?php echo __('Location'); ?></a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw1_tab_4"><?php echo __('Extra'); ?></a>
        </li>

    </ul>
    <div class="tab-content" >
        <div id="yw1_tab_1" class="tab-pane fade active in" >

            <?php echo $form->labelEx($model, 'imgfiles'); ?>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-camera"></i></span>
                <?php echo $form->fileField($model, 'imgfiles', array('class' => 'span9')); ?> 
            </div>
            <p class="help-block"><?php echo __('Upload photo.'); ?></p>



            <?php echo $form->textFieldRow($model, 'name', array('class' => 'span9', 'maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'lastname', array('class' => 'span9', 'maxlength' => 50)); ?>

            <?php
            echo $form->datepickerRow($model, 'date_of_birth', array(
                'hint' => 'Selct your Date of Birth',
                'prepend' => '<i class="icon-calendar"></i>'));
            ?>

            <div class="input-prepend">
                <span class="add-on"><i class="icon-globe"></i></span>
                <?php
                echo $form->dropDownList($model, 'gender', $gender);
                ?>
            </div>


            <?php echo $form->textFieldRow($model, 'cell', array('class' => 'span9', 'maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'cf', array('class' => 'span9', 'maxlength' => 45)); ?>

            <?php echo $form->textFieldRow($model, 'documento', array('class' => 'span9', 'maxlength' => 255)); ?>


        </div>
        <div id="yw1_tab_2" class="tab-pane fade " >
            <?php echo $form->textAreaRow($model, 'skills', array('class' => 'span9', 'maxlength' => 455)); ?>

            <?php echo $form->textAreaRow($model, 'experience_description', array('class' => 'span9', 'maxlength' => 455)); ?>

            <?php echo $form->textAreaRow($model, 'education', array('class' => 'span9', 'maxlength' => 255)); ?>

            <?php echo $form->textAreaRow($model, 'about_me', array('class' => 'span9', 'maxlength' => 255)); ?>

        </div>
        <div id="yw1_tab_3" class="tab-pane fade " >


            <?php echo $form->labelEx($model, 'country'); ?>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-th-list"></i></span>
                <?php
                echo $form->dropDownList($model, 'country', $country, array(
                    'data-placeholder' => __('Select a Country'),
                    'class' => 'input-large',));
                ?>
            </div>

            <?php echo $form->labelEx($model, 'city'); ?>
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
                'htmlOptions' => array('class' => 'span9', 'placeholder' => __("City")),
                    )
            );
            ?>

            <?php echo $form->textFieldRow($model, 'street', array('class' => 'span9', 'maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'cap', array('class' => 'span9')); ?>

        </div>

        <div id="yw1_tab_4" class="tab-pane fade " >
            <?php // echo $form->textFieldRow($model, 'resume', array('class' => 'span9', 'maxlength' => 255)); ?>
            <?php echo $form->labelEx($model, 'docfiles'); ?>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-file"></i></span>
                <?php echo $form->fileField($model, 'docfiles', array('class' => 'span9')); ?> 
            </div>
            <p class="help-block"><?php echo __('Upload Resume.'); ?></p>

            <br/><br/><br/><br/><br/>
            
            
        
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
    </div> 

    <?php $this->endWidget(); ?>

    <?php
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerScriptFile($baseUrl . '/js/counter/jquery.jqEasyCharCounter.min.js');
    //in your view where you want to include JavaScripts

    $cs->registerScript('indicators', "$('#Profiles_skills, #Profiles_experience_description, #Profiles_education, #Profiles_about_me').jqEasyCounter({
    'maxChars': 255,
    'maxCharsWarning': 200,
    'msgFontSize': '12px',
    'msgFontColor': '#000',
    'msgFontFamily': 'Arial',
    'msgTextAlign': 'left',
    'msgWarningColor': '#F00',
    'msgAppendMethod': 'insertBefore'              
});
$('#Profiles_cf').jqEasyCounter({
    'maxChars': 16,
    'maxCharsWarning': 16,
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