<div class="row-fluid">
    <div class="span4">
        <a class="thumbnail">
            <?php
            $link = Yii::app()->request->baseUrl . '/uploads/img/' . $model->photo;
            echo CHtml::image($link, "User Photo", array('class' => 'image_thumb'));
            ?>
        </a>
        <br/>
         <?php
            $social = Social::model()->findByPk($model->user_id);
            if ($social->facebook!='') {?>
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
          <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'null',
            'label' => __('Manage Social Contacts'),
            'url'=>array('social/update', 'id'=>$social->user_id)
        ));
        ?>
         <?php }else{ ?>
            <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'primary',
            'label' => __('Add Social Contacts'),
            'url'=>array('social/create', 'user_id'=>$model->user_id)
        ));
        ?>
            <?php }?>
        
        <hr/>
        <p>
                <span class="label label-success">223 Euro</span>       
        </p>
        <ul>
          
            <li>
                <b><?php echo __("Gender :"); ?></b>
                <?php echo CHtml::encode(Lookup::item('gender', $model->gender)); ?>
            </li>
            <li>
                <b><?php echo __("Resume :"); ?></b><?php
                echo $model->resume;
                echo CHtml::link(' <i class=""></i>', Yii::app()->request->baseUrl.'/uploads/doc/'.$model->resume);
                ?>
               
            </li>
        </ul>

        <p>
            <i class="icon-star icon-2x"></i>
            <i class="icon-star icon-2x"></i>
            <i class="icon-star icon-2x"></i>
            <i class="icon-star-half icon-2x"></i>
        </p>
    </div>
    <div class="span8">
        <h1><?php echo $model->name . ' ' . $model->lastname; ?> 
            <?php if($model->date_of_birth !='') echo '( '; ?>
            <small><?php echo CHtml::encode(Yii::app()->dateFormatter->format("dd MMM yyyy ", $model->date_of_birth)); ?></small>
            <?php if($model->date_of_birth !='') echo ') '; ?></h1>
        <h3><?php if(($model->city !='') && ($model->street!='')) echo $model->city . ', ' . $model->street . ', ' . $model->cap; ?></h3>  
        <hr>
        <blockquote>
            <h3>About Me</h3>
            <p><?php if($model->about_me !=''){echo $model->about_me; }else{ echo '<i>Edit your profile</i>';} ?></p>
        </blockquote>

        <blockquote>
            <h3>My Education</h3>
            <p><?php if($model->education !=''){echo $model->education; }else{ echo '<i>Edit your profile</i>';} ?></p>
        
        </blockquote>      

        <blockquote>
            <h3>My Mork Experience</h3>
            <p><?php if($model->experience_description !=''){echo $model->experience_description; }else{ echo '<i>Edit your profile</i>';} ?></p>
        
        </blockquote>

        <blockquote>
            <h3>Skils</h3>
            <p><?php if($model->skills !=''){echo $model->skills; }else{ echo '<i>Edit your profile</i>';} ?></p>
        
        </blockquote>
        <blockquote>
            <h3>Experience</h3>
            <p><?php if($model->experience_description !=''){echo $model->experience_description; }else{ echo '<i>Edit your profile</i>';} ?></p>
        
        </blockquote>
    </div>
</div>


<hr/>
