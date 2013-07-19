<?php echo CHtml::form(); ?>
    <div id="langdrop">
        <?php echo CHtml::dropDownList('lang', $currentLang, array(
            'en_us' => 'English', 'it_it' => 'Italian'), array('submit' => '')); ?>
    </div>
<?php echo CHtml::endForm(); ?>
