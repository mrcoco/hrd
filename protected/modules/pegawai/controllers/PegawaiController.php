<?php

class PegawaiController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $defaultAction = 'admin';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'rights',
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $pegawai = $this->loadModel($id);
        $pendidikan = $this->createPendidikan($pegawai);
        $this->render('view', array(
            'model' => $pegawai,
            'pendidikan' => $pendidikan,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Pegawai;
        $keluarga = new Keluarga;
        $user = new User;

        $model->jenis_kelamin = 1;
        $keluarga->marital_status = 0;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User']) && isset($_POST['Pegawai']) && isset($_POST['Keluarga'])) {

            $keluarga->attributes = $_POST['Keluarga'];
            $user->attributes = $_POST['User'];
            $model->attributes = $_POST['Pegawai'];
            $model->keluarga = $keluarga;
            $model->user = $user;

            $model->file = CUploadedFile::getInstance($model, 'file');
            $fileName = sha1($model->file->getName() . rand(1, 9999999999)) . '.' . $model->file->getExtensionName();
            $model->file_name = $fileName;
            $dir = Yii::getPathOfAlias('webroot') . Yii::app()->params['uploads'];
            if ($model->file->saveAs($dir . '/' . $fileName))
                if ($model->save()) {
                    $model->keluarga->pegawai_id = $model->id;
                    $model->user->status = 1;
                    $model->user->pegawai_id = $model->id;
                    if ($model->keluarga->save() && $model->user->save())
                        $this->redirect(array('view', 'id' => $model->id));
                }
        }

        $this->render('create', array(
            'model' => $model,
            'user' => $user,
            'keluarga' => $keluarga,
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


        if (isset($_POST['User']) && isset($_POST['Pegawai']) && isset($_POST['Keluarga'])) {
            $model->attributes = $_POST['Pegawai'];
            $model->keluarga->attributes = $_POST['Keluarga'];
            $model->user->attributes = $_POST['User'];

            $model->file = CUploadedFile::getInstance($model, 'file');
            if ($model->file !== null) {
                $fileName = sha1($model->file->getName() . rand(1, 9999999999)) . '.' . $model->file->getExtensionName();
                $model->file_name = $fileName;
                $dir = Yii::getPathOfAlias('webroot') . Yii::app()->params['uploads'];
                $model->file->saveAs($dir . '/' . $fileName);
            }
            if ($model->save()) {
                $model->keluarga->pegawai_id = $model->id;
                $model->user->status = 1;
                $model->user->pegawai_id = $model->id;
                if ($model->keluarga->save() && $model->user->save())
                    $this->redirect(array('view', 'id' => $model->id));
            }
        }


        $this->render('update', array(
            'model' => $model,
            'user' => $model->user,
            'keluarga' => $model->keluarga,
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
        $dataProvider = new CActiveDataProvider('Pegawai');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Pegawai('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Pegawai']))
            $model->attributes = $_GET['Pegawai'];

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
        $model = Pegawai::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pegawai-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    protected function createPendidikan($pegawai) {
        $pendidikan = new Pendidikan;
        if (isset($_POST['Pendidikan'])) {
            $pendidikan->attributes = $_POST['Pendidikan'];

            $pendidikan->file = CUploadedFile::getInstance($pendidikan, 'file');
            $fileName = sha1($pendidikan->file->getName() . rand(1, 9999999999)) . '.' . $pendidikan->file->getExtensionName();
            $pendidikan->file_name = $fileName;
            $dir = Yii::getPathOfAlias('webroot') . Yii::app()->params['uploads'];
            if ($pendidikan->file->saveAs($dir . '/' . $fileName))
                if ($pegawai->addPendidikan($pendidikan)) {
                    Yii::app()->user->setFlash('pendidikanSubmitted', "Your pendidikan has been added.");
                    $this->refresh();
                }
        }
        return $pendidikan;
    }

}
