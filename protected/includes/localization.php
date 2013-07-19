<?php
/**
 * Wrapper function for Yii::t()
 */
function __($string, $params = array(), $category = "") {
        
        return Yii::t($category, $string, $params, 'messages');
}

/**
 * Wrapper function for Yii::app()->numberFormatter->format()
 */
function fn($value) {
        return Yii::app()->numberFormatter->format('###0.00', $value);
}
?>