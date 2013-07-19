<?php

class LoginController extends Controller {

    public $defaultAction = 'login';

    /**
     * Displays the login page
     */
    public function actionLogin() {

        if (Yii::app()->user->isGuest) {
            $model = new UserLogin;
            // collect user input data
            if (isset($_POST['UserLogin'])) {
                $model->attributes = $_POST['UserLogin'];
                // validate user input and redirect to previous page if valid
                if ($model->validate()) {
                    $this->lastViset();
                    $user_id = Yii::app()->user->id;
                    $user = User::model()->findByPk($user_id);
                    if ($user->type == 1) {
                        $link = '../profiles/profile';
                    } else {
                        $link = '../profiles/profilec';
                    }
                    if (Yii::app()->user->returnUrl == '/index.php')
                        $this->redirect($link);
                    else
                        $this->redirect(Yii::app()->user->returnUrl);
                }
            }
            // display the login form
            $this->render('/user/login', array('model' => $model));
        } else {
            $this->redirect($link);
        }
    }

    private function lastViset() {
        $lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
        $lastVisit->lastvisit = time();
        $lastVisit->save();
    }

}