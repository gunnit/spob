<?php $this->beginContent('//layouts/main'); ?>
<div class="span9">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span2 pull-right" style="margin-right: 20px;">
	<div id="sidebar">
	<?php
//		$this->beginWidget('zii.widgets.CPortlet', array(
//			//'title'=>'Operations',
//		));
//		$this->widget('bootstrap.widgets.TbMenu', array(
//			'items'=>$this->menu,
//                        'type'=>'list',
//			'htmlOptions'=>array('class'=>'operations'),
//		));
//		$this->endWidget();
                
                  $this->widget('bootstrap.widgets.TbMenu', array(
                    'type'=>'list',
                     'htmlOptions'=>array('class'=>'well'),
                    'items'=>$this->menu,
                ));
	?>

	</div><!-- sidebar -->
</div>

<?php $this->endContent(); ?>