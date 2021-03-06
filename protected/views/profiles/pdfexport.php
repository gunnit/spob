<style>
    .table {
        width: 100%;
        margin-bottom: 20px;
    }

    .table-condensed th, .table-condensed td {
        padding: 4px 5px;
    }
    .table th {
        font-weight: bold;
    }
    .table th, .table td {
        padding: 8px;
        line-height: 20px;
        text-align: left;
        vertical-align: top;

    }
    table td, table th {
        padding: 9px 10px;
        text-align: left;
    }
    table th {
        font-weight: bold;
    }


    .table th, .table td {
        padding: 8px;
        line-height: 20px;
        text-align: left;
        vertical-align: top;
        border-top: 1px solid #ddd;
    }
    .line-separator{

        height:1px;

        background:#4573A7;

        border-bottom:1px solid #4573A7;

    }
    h3{
        font-weight: bold;
    }
</style>

<?php
$profile_review = Profile::model()->findAll(array(
    'having' => 'user_id=:user_id',
    'params' => array(
        ':user_id' => Yii::app()->user->id,)));
foreach ($profile_review as $review) {
    ?>

    <page backtop="7mm" backbottom="7mm" backleft="10mm" backright="10mm" pageset="old">                 

        <br/>
        <div id="logo" >  
            <?php // echo CHtml::image(Yii::getPathOfAlias('webroot.uploads.img') . $review->photo );  ?>
        </div>


        <h2 style="text-align: center;">
            <?php echo $review->name . ' ' . $review->lastname; ?>
        </h2>
        <div class="line-separator"></div> 
        <h3>About Me</h3>
        <p> <?php echo $review->about_me; ?></p>
        <h3>Experience</h3>
        <p> <?php echo $review->experience_description;?></p>
        <h3>Education</h3>
        <p> <?php echo $review->education; ?></p>
    </page>

<?php } ?>

