<?php
$this->breadcrumbs = array(
    'All Jobs',
);
if(!Yii::app()->user->isGuest){
$this->menu = array(
    ((!Yii::app()->getModule('user')->isEmployee()) ? array(
        'label' => __('Create New Job'),
        'icon' => 'icon-pencil',
        'url' => array('create')) : array()),
    array(
        'label' => __('Search A Job'),
        'icon' => 'icon-search',
        'url' => array('admin')),
);}
?>

<?php Yii::app()->clientScript->registerScript('toggleDetails', "
    $('.closed').hide();
    $('.toggleDetails').click(function(e){
        var id = $(this).data('id');
        $('#detailsDiv-' + id).slideToggle();
        e.preventDefault();
    });
", CClientScript::POS_READY);
?>

<div class="page-header">
    <h1 ><?php echo __('List of all Approved Jobs'); ?> <small> <?php echo __('Keep up to date'); ?></small></h1>
</div>

<?php
//$this->widget('bootstrap.widgets.TbListView',array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//        'emptyText'=>'No jobs available at this time',
//        
//));
?>
<div id="posts">
    <?php foreach ($posts as $post): ?>
    
    <?php
    $partecipants = BridgeContract::model()->count(array(
    'condition' => 'id_employer_contract=:id_employer_contract',
    'params' => array(
        ':id_employer_contract' => $post->id_employer_contract,
    )
        ));
    ?>
    
        <div class="post">

            <div class="row-fluid view">
                <div class="span5">

                    <?php echo CHtml::link(CHtml::encode($post->title), array('view', 'id' => $post->id_employer_contract), array('rel' => "tooltip", 'title' => __("View Details"))); ?>
                    <br />
                    <?php echo $post->description; ?>
                    <br />
                           </div>
                <div class="span5">
                    <address>
                        <b><?php echo CHtml::encode($post->getAttributeLabel('start_date')); ?>:</b>
                        <?php echo Yii::app()->dateFormatter->format("dd MMMM yyyy ", $post->start_date); ?>
                        <br />

                        <b><?php echo CHtml::encode($post->getAttributeLabel('end_date')); ?>:</b>
                        <?php echo Yii::app()->dateFormatter->format("dd MMMM yyyy ", $post->end_date); ?>
                        <br />
                        <b><?php echo CHtml::encode($post->getAttributeLabel('user_id')); ?>:</b>
                        <?php echo $post->user->username; ?>
                        <br />

                        <b><?php echo CHtml::encode($post->getAttributeLabel('cost')); ?>:</b>
                        <?php
                        $cn = new CNumberFormatter('en_us');
                        echo $cn->formatCurrency($post->cost, '€').' ('.CHtml::encode($post->cost_description).')';
                        ?>
                        <br />

                       
                        <b><?php echo CHtml::encode($post->getAttributeLabel('tipology')); ?>:</b>
                        <?php echo CHtml::encode(Lookup::item('tipology', $post->tipology)); ?> 
                        <br />

                        <b><?php echo CHtml::encode($post->getAttributeLabel('creation_date')); ?>:</b>
                        <?php echo CHtml::encode($post->creation_date); ?>
                        <br />




                        <!-- <abbr title="Phone">Tel:</abbr> --><?php // echo CHtml::encode($post->tel);      ?>
                    </address>


                </div>
                <div class="span2">

                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'type' => 'primary',
                        'icon' => 'icon-plus',
                        'url' => array('view', 'id' => $post->id_employer_contract),
                        'htmlOptions' => array('rel' => "tooltip", 'title' => __("Open")),
                    ));
                    ?>

                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType' => 'button',
                        'type' => 'null',
                        'icon' => 'icon-bullhorn',
                        'htmlOptions' => array('class' => 'toggleDetails', 'rel' => "tooltip", 'title' => __("View Details"), 'data-id' => $post->id_employer_contract),
                    ));
                    ?>
                    <hr/>
            <div class="date" style="line-height: 1;">
                <a href="#" rel="tooltip" style="text-decoration: none;" data-original-title="Publication Date">
                    <p>
                        <?php
                        $dates_day_created = Yii::app()->dateFormatter->format("dd", $post->creation_date);
                        $dates_month_created = Yii::app()->dateFormatter->format("MMM", $post->creation_date);
                        echo $dates_day_created; ?>
                        <span><?php echo $dates_month_created; ?></span>
                    </p>
                </a>           
            </div>
                </div>

            </div>
            <div class="row-fluid closed" id="detailsDiv-<?php echo $post->id_employer_contract; ?>" style="background-color: #ccccff">
           

                <b><?php echo CHtml::encode($post->getAttributeLabel('update_date')); ?>:</b>
    <?php echo CHtml::encode($post->update_date); ?>
                <br />

                <b><?php echo CHtml::encode($post->getAttributeLabel('indoors')); ?>:</b>
    <?php echo CHtml::encode(Lookup::item('indoors', $post->indoors)); ?> 
                <br />

                <b><?php echo CHtml::encode($post->getAttributeLabel('customer_facing')); ?>:</b>
    <?php echo CHtml::encode(Lookup::item('option', $post->customer_facing)); ?> 
                <br />

                <b><?php echo CHtml::encode($post->getAttributeLabel('day_period')); ?>:</b>        
    <?php echo CHtml::encode(Lookup::item('day_period', $post->day_period)); ?> 
                <br />
            </div>	
        </div>
    <b><?php echo __('Applied for this job :').(int)$partecipants; ?></b>
  
    <div class="scissorz"></div>
       <?php endforeach; ?>
</div>


<?php
$this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#posts',
    'itemSelector' => 'div.post',
    'loadingText' => 'Loading...',
    'donetext' => 'This is the end... my friend, the end',
    'pages' => $pages,
));
 $this->widget('ext.ScrollTop', array(
                'label' => 'Go on top',
                'speed' => 'slow'
            ));
?>

                   

