<?php

class ProfilesController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'summary', 'profile', 'profilec', 'evaluation', 'visualcv'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin', 'update', 'updatec', 'pdfexport'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'create'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the user to be displayed
     */
    public function actionProfile() {
        $this->layout = '//layouts/column1';
        $user_id = Yii::app()->user->id;
        $model = Profile::model()->findByPk($user_id);
        $user = User::model()->findByPk($user_id);
        $funds = UserFunds::model()->findByPk($user_id);
        $social = Social::model()->find(array(
            'having' => 'user_id=:user_id',
            'params' => array(
                ':user_id' => $user_id,
            )
                ));

        $jobs = new BridgeContract('search');
        $jobs->unsetAttributes();  // clear any default values
        if (isset($_GET['BridgeContract']))
            $jobs->attributes = $_GET['BridgeContract'];

        $this->render('profile', array(
            'model' => $model,
            'social' => $social,
            'user' => $user,
            'jobs' => $jobs,
            'funds'=>$funds,
        ));
    }

    public function actionProfilec() {
        $this->layout = '//layouts/column1';
        $user_id = Yii::app()->user->id;
        $model = Profile::model()->findByPk($user_id);
        $user = User::model()->findByPk($user_id);
        $funds = UserFunds::model()->findByPk($user_id);

        $social = Social::model()->find(array(
            'having' => 'user_id=:user_id',
            'params' => array(
                ':user_id' => $user_id,
            )
                ));


        $dataProvider = new CActiveDataProvider('EmployerContract');


       // $criteria = 'user_id=' . Yii::app()->user->id . ' AND start_date>curdate()';
        $criteria = 'user_id=' . Yii::app()->user->id ;
        $dataProvider = new CActiveDataProvider('EmployerContract', array(
                    'criteria' => array(
                        'condition' => $criteria,
                        'order' => 'creation_date DESC',
                    ),
//                    'pagination' => array('pageSize' => 3,),
                ));


        $history = new EmployerContract('searchalljobs');
        $history->unsetAttributes();  // clear any default values
        if (isset($_GET['EmployerContract']))
            $history->attributes = $_GET['EmployerContract'];



        $this->render('profilec', array(
            'model' => $model,
            'social' => $social,
            'user' => $user,
            'dataProvider' => $dataProvider,
            'history' => $history,
            'funds' =>  $funds,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Profiles;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Profiles'])) {
            $model->attributes = $_POST['Profiles'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->user_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $this->layout = '//layouts/column1';
        $user_id = Yii::app()->user->id;
        $model = Profiles::model()->findByPk($id);

        //$social = Social::model()->findByPk($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);


        if (isset($_POST['Profiles'])) {
            //variable to make the file name different
            //Upload image mecchanism
            $model->attributes = $_POST['Profiles'];
            $social = Social::model()->findByPk($model->user_id);
            $uploaded_img = CUploadedFile::getInstance($model, 'imgfiles'); //get the image details
            $uploaded_file = CUploadedFile::getInstance($model, 'docfiles');
            if (!empty($uploaded_img->name)) {
                $uploaded_img->saveAs(Yii::getPathOfAlias('webroot') . '/uploads/img/' . $time . $uploaded_img->name);
                $model->photo = $time . $uploaded_img->name; //put the image name in the db meetings    
            }
            if (!empty($uploaded_file->name)) {
                $uploaded_file->saveAs(Yii::getPathOfAlias('webroot') . '/uploads/doc/' . $time . $uploaded_img->name);
                $model->resume = $time . $uploaded_file->name; //put the image name in the db meetings    
            }
            if ($model->save()) {
                Yii::app()->user->setFlash('success', __("Success you have updated your Visual CV"));
                    if (isset($_POST['Social'])) {
                        $social->attributes = $_POST['Social'];
                        if ($social->save()) {
                            Yii::app()->user->setFlash('success', __("Success you have updated your Visual CV"));
                        }
                    }//close the check for social
                $this->redirect(array('profile'));
            } else {//close the save profile
                Yii::app()->user->setFlash('error', __("There was an error saving your data."));
            }
        }

        $this->render('update', array(
            'model' => $model,
                //'social' => $social,
        ));
    }

    public function actionUpdatec($id) {
        $this->layout = '//layouts/column1';
        $user_id = Yii::app()->user->id;
        $model = $this->loadModel($id);
        $time = time();
        //$social = Social::model()->findByPk($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);


        if (isset($_POST['Profiles'])) {
            //variable to make the file name different
            //Upload image mecchanism
            $model->attributes = $_POST['Profiles'];
            $social = Social::model()->findByPk($model->user_id);
            $uploaded_img = CUploadedFile::getInstance($model, 'imgfiles'); //get the image details
            $uploaded_file = CUploadedFile::getInstance($model, 'docfiles');
            if (!empty($uploaded_img->name)) {
                $uploaded_img->saveAs(Yii::getPathOfAlias('webroot') . '/uploads/img/' . $time . $uploaded_img->name);
                $model->photo = $time . $uploaded_img->name; //put the image name in the db meetings    
            }
            if (!empty($uploaded_file->name)) {
                $uploaded_file->saveAs(Yii::getPathOfAlias('webroot') . '/uploads/doc/' . $time . $uploaded_img->name);
                $model->resume = $time . $uploaded_file->name; //put the image name in the db meetings    
            }
            if ($model->save()) {
                Yii::app()->user->setFlash('success', __("Success you have updated your Visual CV"));
                    if (isset($_POST['Social'])) {
                        $social->attributes = $_POST['Social'];
                        if ($social->save()) {
                            Yii::app()->user->setFlash('success', __("Success you have updated your Visual CV"));
                        }
                    }//close the check for social
                $this->redirect(array('profilec'));
            } else {//close the save profile
                Yii::app()->user->setFlash('error', __("There was an error saving your data."));
            }
        }


        $this->render('updatec', array(
            'model' => $model,
                //'social' => $social,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Profiles');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionEvaluation() {

        $this->render('evaluation');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Profiles('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Profiles']))
            $model->attributes = $_GET['Profiles'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Profiles::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'profiles-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionPdfexport() {

        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->WriteHTML($this->renderPartial('pdfexport', array(), true));
        $html2pdf->Output();
    }

    public function actionVisualcv($id) {
        $this->layout = '//layouts/column1';
        //$id = $_GET['user_id'];
        $model = Profile::model()->findByPk($id);
        $user = User::model()->findByPk($id);

        $social = Social::model()->find(array(
            'having' => 'user_id=:user_id',
            'params' => array(
                ':user_id' => $user_id,
            )
                ));

        $this->render('visualcv', array(
            'model' => $model,
            'social' => $social,
            'user' => $user,
        ));
    }

}
