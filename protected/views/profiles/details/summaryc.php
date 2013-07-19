<div class="row-fluid">
    <div class="span4">
        <a class="thumbnail">
            <?php
            $link = Yii::app()->request->baseUrl . '/uploads/img/' . $model->photo;
            echo CHtml::image($link, "User Photo", array('class' => 'image_thumb'));
            ?>
        </a>
        <br/>
        <h4>Contact Info</h4>
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
            'url'=>array('social/update', 'id'=>$model->user_id)
        ));
        ?>
            <?php }?>
        <br/>
        <br/>
        <h4>Total Cash Available</h4> :<span class="label label-success"><?php echo (int)$funds->funds.' Euros'; ?></span>       
        
    </div>
    <div class="span8">
        <h1><?php echo $model->name . ' ' . $model->lastname; ?></h1>
         <h3><?php if(($model->city!='') && ($model->street!='')) echo $model->city . ', ' . $model->street . ', ' . $model->cap; ?></h3>  
       <hr>
        <blockquote>
            <h3>Company/Employer Info</h3>
            <p><?php if($model->about_me !=''){echo $model->about_me; }else{ echo '<i>Edit your profile</i>';} ?></p>
        
        </blockquote>

         <p>
            <i class="icon-star icon-4x icon-large"></i>
            <i class="icon-star icon-4x icon-large"></i>
            <i class="icon-star icon-4x icon-large"></i>
            <i class="icon-star-half icon-4x icon-large"></i>
        </p>
        
           <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => __('Post a Job'),
                        'type' => 'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        'size' => 'large', // null, 'large', 'small' or 'mini'
                        'icon' => 'coffee',
                        'url' => array('employercontract/create'),
                    ));
                    ?>
        
    </div>
</div>

<hr/>
