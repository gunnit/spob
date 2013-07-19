<?php

class EmployerContractController extends Controller {

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
                'actions' => array('index', 'view', 'quick', 'approve', 'alljobs'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'apply', 'contractor', 'toggle', 'pdfexport'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionApply() {
        //open connection to bridge table and insert current user and current ID 

        $model = new BridgeContract;
        $id_contract = $_GET['id_contract'];
        $model->user_id = Yii::app()->user->id;
        $model->id_employer_contract = $id_contract;
        $model->id_employer = $_GET['id_employer'];

        if ($model->save()) {
            Yii::app()->user->setFlash('success', __("Congratualations you have been successefully applied for this job! Now before getting your hands dirty wait for a confirmation. "));
            $this->redirect(array('view', 'id' => $id_contract));
        } else {
            Yii::app()->user->setFlash('error', __("You alreaddy applied for this job."));
        }
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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new EmployerContract;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['EmployerContract'])) {
            $model->attributes = $_POST['EmployerContract'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_employer_contract));
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
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['EmployerContract'])) {
            $model->attributes = $_POST['EmployerContract'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_employer_contract));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, __('Invalid request. Please do not repeat this request again.'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
//        $dataProvider = new CActiveDataProvider('EmployerContract');
//        $this->render('index', array(
//            'dataProvider' => $dataProvider,
//        ));

        $criteria = new CDbCriteria;
        $total = EmployerContract::model()->count();

        $pages = new CPagination($total);
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);

        $posts = EmployerContract::model()->findAll($criteria);

        $this->render('index', array(
            'posts' => $posts,
            'pages' => $pages,
        ));
    }

    public function actionQuick() {


        $criteria = new CDbCriteria();

        if (isset($_GET['q'])) {
            $q = $_GET['q'];
            $criteria->compare('title', $q, true, 'OR');
            // $criteria->compare('description', $q, true, 'OR');
        }

        $dataProvider = new CActiveDataProvider("EmployerContract", array('criteria' => $criteria));

        $this->render('quick', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Lists all models.
     */
    public function actionContractor() {
        $dataProvider = new CActiveDataProvider('EmployerContract');

        //$criteria = 'user_id=' . Yii::app()->user->id . ' AND start_date>curdate() AND status=1';
        $criteria = 'user_id=' . Yii::app()->user->id;
        $dataProvider = new CActiveDataProvider('EmployerContract', array(
            'criteria' => array(
                'condition' => $criteria,
                'order' => 'creation_date DESC',
            ),
        ));

        $this->render('contractor', array(
            'dataProvider' => $dataProvider,
        ));
    }

//     public function actionAlljobs() {
//        $dataProvider = new CActiveDataProvider('EmployerContract');
//
//        $criteria = 'user_id=' . Yii::app()->user->id;
//        $dataProvider = new CActiveDataProvider('EmployerContract', array(
//                    'criteria' => array(
//                        'condition' => $criteria,
//                        'order' => 'creation_date DESC',
//                    ),
////                    'pagination' => array('pageSize' => 3,),
//                ));
//
//
//        $this->render('alljobs', array(
//            'dataProvider' => $dataProvider,
//        ));
//    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new EmployerContract('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['EmployerContract']))
            $model->attributes = $_GET['EmployerContract'];

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
        $model = EmployerContract::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, __('The requested page does not exist.'));
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'employer-contract-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * CONFIRM FOR THE JOB .
     */
    public function actions() {
        return array(
            'toggle' => array(
                'class' => 'bootstrap.actions.TbToggleAction',
                'modelName' => 'EmployerContract',
            )
        );
    }

    public function actionPdfexport() {

        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->WriteHTML($this->renderPartial('pdfexport', array(), true));
        $html2pdf->Output();
    }

    public function actionApprove($id) {
        $model = EmployerContract::model()->findByPk($id);

        $funds = UserFunds::model()->findByPk(Yii::app()->user->id);
        $current_funds = ($funds->funds) - ($model->cost);
        $funds->funds = $current_funds;
        $funds->save(false);

        $model->status = 1;
        if ($model->save(false)) {
            $this->redirect(array('profiles/profilec', 'id' => $model->id_employer_contract));
        }
    }

}
