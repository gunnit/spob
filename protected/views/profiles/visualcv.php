  
<div class="row-fluid">
    <div class="span3">
        <a class="thumbnail">
            <?php
            $link = Yii::app()->request->baseUrl . '/uploads/img/' . $model->photo;
            echo CHtml::image($link, "User Photo", array('class' => 'image_thumb'));
            ?>
        </a>
        <br/>
        <ul>            
            <li><a href="#"><i rel="tooltip" title=<?php echo __("View Details"); ?> class=" icon-envelope-alt icon-2x"></i></a>
                <span class="social_contact"><?php echo $user->email; ?></span>
            </li>
            <li><i rel="tooltip" title=<?php echo __("View Details"); ?> class=" icon-phone-sign icon-2x"></i>
                <span class="social_contact"><?php echo $model->cell; ?></span>
            </li>
            <li><i rel="tooltip" title=<?php echo __("View Details"); ?> class="icon-facebook-sign icon-2x"></i>
                <span class="social_contact"><?php echo $social->facebook; ?></span>
            </li>
            <li><i rel="tooltip" title=<?php echo __("View Details"); ?> class="icon-twitter-sign icon-2x"></i>
                <span class="social_contact"><?php echo $social->twitter; ?></span>
            </li>
            <li><i rel="tooltip" title=<?php echo __("View Details"); ?> class="icon-linkedin-sign icon-2x"></i>
                <span class="social_contact"><?php echo $social->linkedin; ?></span>
            </li>
            <li><i rel="tooltip" title=<?php echo __("View Details"); ?> class="icon-google-plus-sign icon-2x"></i>
                <span class="social_contact"><?php echo $social->google; ?></span>
            </li>          

        </ul>
        <hr/>
        <ul>
            <li>
                <b><?php echo __("Date Of Birth :"); ?></b>
                <?php echo CHtml::encode(Yii::app()->dateFormatter->format("dd MMM yyyy ", $model->date_of_birth)); ?>
            </li>
            <li>
                <b><?php echo __("Gender :"); ?></b>
                <?php echo CHtml::encode(Lookup::item('gender', $model->gender)); ?>
            </li>
            <li>
                <b><?php echo __("Resume :"); ?></b><?php echo $model->resume; ?>
            </li>
        </ul>

        <p>
            <i class="icon-star icon-2x"></i>
            <i class="icon-star icon-2x"></i>
            <i class="icon-star icon-2x"></i>
            <i class="icon-star-half icon-2x"></i>
        </p>
    </div>
    <div class="span6">
        <h1><?php echo $model->name . ' ' . $model->last_name; ?></h1>
        <h3><?php echo $model->city . ', ' . $model->street . ', ' . $model->cap; ?></h3>  
        <hr>
        <blockquote>
            <h3>About Me</h3>
            <p><?php echo $model->about_me; ?></p>
        </blockquote>

        <blockquote>
            <h3>My Education</h3>
            <p><?php echo $model->education; ?></p>
        </blockquote>      

        <blockquote>
            <h3>My Mork Experience</h3>
            <p><?php echo $model->experience_description; ?></p>
        </blockquote>

        <blockquote>
            <h3>Skils</h3>
            <p><?php echo $model->skills; ?></p>
        </blockquote>
        <blockquote>
            <h3>Experience</h3>
            <p><?php echo $model->experience_description; ?></p>
        </blockquote>
    </div>
      <div class="span2 offset1">
                    <a href="../evaluation"><div class="chart" data-percent="73">73%</div></a>Overall Satisfaction
                    <div class="chart" data-percent="43">43%</div>Physical Skills 
                    <!--                    - Strenght - Speed - Agility - Stamina - Coordination  -->
                    <div class="chart" data-percent="13">43%</div>Soft Skills
                    <!--                    - Communication - Adaptability - Problem Solving - Conflict Resolution -  Work ethic - Positive attitude-->
                    <div class="chart" data-percent="53">43%</div>Teamwork 
                    <!--                    - Listening - Questioning - Persuading - Respecting - Helping - Participating-->
                    <div class="chart" data-percent="83">43%</div>Leadership 
                    <!--                    - Honesty - Sense of Humor - Confidence - Commitment - Positive Attitude - Creativity - Intuition - Ability to Inspire-->

                </div>
</div>


<hr/>
<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl . '/js/indicator/jquery.easy-pie-chart.js');
$cs->registerCssFile($baseUrl . '/js/indicator/jquery.easy-pie-chart.css');
//in your view where you want to include JavaScripts

$cs->registerScript('indicators', '$(function() {
    $(".chart").easyPieChart({
        //your configuration goes here
    });
});', CClientScript::POS_END
);
?>