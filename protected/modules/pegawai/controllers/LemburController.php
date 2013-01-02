<?php

class LemburController extends Controller {

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
            'rights',
            'accessControl', // perform access control for CRUD operations
            'pegawaiContext + create index admin', //check to ensure valid pegawai context
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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Lembur;
        $model->pegawai_id = $this->_pegawai->id;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Lembur'])) {
            $model->attributes = $_POST['Lembur'];
            $model->biaya = $model->countBiaya($model->tanggal, $model->lama);
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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

        if (isset($_POST['Lembur'])) {
            $model->attributes = $_POST['Lembur'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Lembur', array(
                    'criteria' => array(
                        'condition' => 'pegawai_id=:pegawaiId',
                        'params' => array(':pegawaiId' => $this->_pegawai->id)
                    ),
                ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'pegawai' => $this->_pegawai,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Lembur('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Lembur']))
            $model->attributes = $_GET['Lembur'];

        $model->pegawai_id = $this->_pegawai->id;
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
        $model = Lembur::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'lembur-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * @var private property containing the associated Pegawai model
      instance.
     */
    private $_pegawai = null;

    /**
     * Protected method to load the associated pegawai model class
     * @pegawai_id the primary identifier of the associated pegawai
     * @return object the pegawai data model based on the primary key
     */
    protected function loadPegawai($pegawai_id) {
        //if the pegawai property is null, create it based on input id
        if ($this->_pegawai === null) {
            $this->_pegawai = Pegawai::model()->findbyPk($pegawai_id);
            if ($this->_pegawai === null) {
                throw new CHttpException(404, 'The requested Pegawai does not exist.');
            }
        }
        return $this->_pegawai;
    }

    /**
     * In-class defined filter method, configured for use in the above
      filters() method
     * It is called before the actionCreate() action method is run in
      order to ensure a proper pegawai context
     */
    public function filterPegawaiContext($filterChain) {
        //set the pegawai identifier based on either the GET or POST input
        //request variables, since we allow both types for our actions
        $pegawaiId = null;
        if (isset($_GET['pid']))
            $pegawaiId = $_GET['pid'];
        else if (isset($_POST['pid']))
            $pegawaiId = $_POST['pid'];
        $this->loadPegawai($pegawaiId);
        //complete the running of other filters and execute the requested action
        $filterChain->run();
    }

}
