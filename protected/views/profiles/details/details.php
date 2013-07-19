<?php
$user_notifications = BridgeContract::model()->findAll(array(
    'having' => 'user_id=:user_id',
    'params' => array(
        ':user_id' => Yii::app()->user->id),
    'order' => 'id_bridge_contract DESC',
        ));
//$tions = EmployerContract::model()->with('sumOfCosts')->findAll();
//$user = User::model()->findBySql('select sum(cost) as cost from tbl_bridge_contract a
//join tbl_employer_contract b using(id_employer_contract)
//where a.user_id=4', array());
////var_dump($user->sum);
//echo $user;
foreach ($user_notifications as $notifications) {
    if ($notifications->approved == 1) {
        ?>
        <div class="alert alert-block alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4 class="alert-heading">You have been approved for a job! :<?php echo $notifications->idEmployerContract->title ?></h4>
            <p>Job description and a link to the job. If the user aproves the job than the
                money is locked and other users cannot do this job no more. 
                The job disapears form the listing and only this user and creator can see it</p>
            <p>

                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'type' => 'null',
                    'label' => _('I changed my mind'),
                    'icon' => 'icon-minus',
                    'url' => array('/bridgecontract/canceljob', 'id' => $notifications->id_bridge_contract, 'job_id' => $notifications->id_employer_contract),
                    'htmlOptions' => array(
                        'onclick' => 'js:bootbox.confirm("Are you sure?",
			function(confirmed){console.log("Confirmed: "+confirmed);})',
                        'rel' => "tooltip",
                        'title' => __("Cancel Approval")),
                ));
                ?>
            </p>
        </div>

    <?php } ?>
    <?php if ($notifications->approved == 1 && $notifications->confirmed == 1) { ?>
        <div class="alert alert-block alert-success fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4 class="alert-heading">You have reccived a payment! :<?php echo $notifications->idEmployerContract->title ?></h4>
            <p>Job description and a link to the job. If the user aproves the job than the
                money is locked and other users cannot do this job no more. 
                The job disapears form the listing and only this user and creator can see it</p>
            <p>
                <?php
                $this->widget('bootstrap.widgets.TbLabel', array(
                    'type' => 'success', // 'success', 'warning', 'important', 'info' or 'inverse'
                    'label' => $notifications->idEmployerContract->cost . ' Euro',
                ));
                ?>
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'type' => 'null',
                    'label' => _('Job Evaluation'),
                    'icon' => 'icon-search',
                    'url' => array('/employerevaluation/evaluation', 'id' => $notifications->id_employer_contract),
                    'htmlOptions' => array(
                        'rel' => "tooltip",
                        'title' => __("Evaluate User")),
                ));
                ?>
            </p>
        </div>

        <?php
    }
}
?>
