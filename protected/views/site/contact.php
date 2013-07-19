<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . __(' - Contact Us');
$this->breadcrumbs=array(
	__('Contact'),
);
?>
<div class="jumbotron jumbotron-ad hidden-print">
  <div class="container">
    <h1><i class="icon-phone icon-large main_icon"></i>&nbsp; Contact Us</h1>
    <p><?php echo __('Need some help, got some feedback - or just want to say hi?'); ?></p>
  </div>
</div>

<div id="social-buttons" class="hidden-print">
  <div class="container">
    <ul class="unstyled inline">
      <li>
        <iframe class="github-btn" src="#" allowtransparency="true" frameborder="0" scrolling="0" width="100px" height="20px"></iframe>
      </li>
      <li>
        <iframe class="github-btn" src="#" allowtransparency="true" frameborder="0" scrolling="0" width="102px" height="20px"></iframe>
      </li>
      <li class="follow-btn">
        <a href="https://twitter.com/SPOB" class="twitter-follow-button" data-link-color="#0069D6" data-show-count="true">Follow @fontawesome</a>
      </li>
      <li class="tweet-btn">
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="#" data-text="Find a job Do it fast" data-counturl="#" data-count="horizontal" data-via="fontawesome" data-related="njunju:Creator of SPOB">Tweet</a>
      </li>
    </ul>
  </div>
</div>


<div class="row-fluidw">
    <div class="span5">
        <h3>How can we help you?</h3>
        <?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
    </div>
    <div class="span5">
        <div class="col-a">
    <div class="inner">
    <h3>Call, email, tweet or poke!</h3>

    <p>If your enquiry or request is urgent or important, you can always call us directly to speak to someone right away. Otherwise, we're on the same social networks as you, so look us up!</p>

    <div class="contact-options">
        <div class="label"><div class="icon phone">Phone</div><a href="tel://131 121">131 121</a></div>
        <div class="label"><div class="icon email">Email</div><a href="mailto:info@spotjobs.com">info@spotjobs.com</a></div>
        <div class="label"><div class="icon twitter">Twitter</div><a href="http://twitter.com/spotjobs">twitter.com/spotjobs</a></div>
        <div class="label"><div class="icon facebook">Facebook</div><a href="http://fb.me/spotjobs">fb.me/spotjobs</a></div>
        <div class="label"><div class="icon address">Address</div>Level 9, 20-22 Albert Rd<br>South Melbourne VIC 3205</div>
    </div>

    </div>
</div>
        
    </div>
</div>
