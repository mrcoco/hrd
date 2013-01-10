<?php

class GajiController extends Controller {

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
            'pegawaiContext + create index admin download', //check to ensure valid pegawai context
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
        $model = new Gaji;
        $model->pegawai_id = $this->_pegawai->id;
        $model->date = date('Y-m-d');
        $model->jumlah_gaji = $this->_pegawai->jabatan->gaji;
        $nptkp = Configuration::getConfigurationByKey('NPTKP');
        $npkp = $model->jumlah_gaji - $nptkp;      
        $model->jumlah_pajak = ($npkp > 0) ? ceil(Pajak::getTarifPajak($npkp)) : 0;
        $model->jumlah_tunjangan = $this->_pegawai->getTunjangan();
        $model->jumlah_lembur = ceil($this->_pegawai->getLembur(date('m')));
        $model->jumlah_bonus = $this->_pegawai->getBonus(date('m'));
        $model->total_gaji_bersih = $model->jumlah_gaji + $model->jumlah_tunjangan + $model->jumlah_lembur + $model->jumlah_bonus - $model->jumlah_pajak;
        // Uncomment the     following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Gaji'])) {
            $model->attributes = $_POST['Gaji'];
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

        if (isset($_POST['Gaji'])) {
            $model->attributes = $_POST['Gaji'];
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
        $dataProvider = new CActiveDataProvider('Gaji', array(
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
        $this->layout = '//layouts/print';
        $model = new Gaji('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Gaji']))
            $model->attributes = $_GET['Gaji'];

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
        $model = Gaji::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'gaji-form') {
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

    /**
     * Lists all models.
     */
    public function actionDownload() {
        $this->layout = '//layouts/column1';
        $bulan = date('m');
        $tahun = date('Y');
        if (isset($_POST['bulan']) && isset($_POST['tahun'])) {
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];

            $criteria = new CDbCriteria;
            $criteria->compare('pegawai_id', $this->_pegawai->id);
            $criteria->compare('MONTH(date)', $bulan);
            $criteria->compare('YEAR(date)', $tahun);
            $model = Gaji::model()->find($criteria);
            if ($model !== null) {
                $mpdf = Yii::app()->ePdf->mpdf();
                $mpdf->WriteHTML($this->renderPartial('slip_pdf', array('model' => $model), true));
                $mpdf->Output();
            }

            Yii::app()->user->setFlash('gajiDownloadError', "Slip Gaji tidak ditemukan");
        }
        $this->render('download', array(
            'bulan' => $bulan,
            'tahun' => $tahun,
        ));
    }

    public function actionRekap() {
        $this->layout = '//layouts/column1';
        $bulan = '';
        $tahun = '';
        if (isset($_POST['bulan']) && isset($_POST['tahun'])) {
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];

            $criteria = new CDbCriteria;
            $criteria->compare('MONTH(date)', $bulan);
            $criteria->compare('YEAR(date)', $tahun);
            $model = Gaji::model()->findAll($criteria);
            if ($model !== null) {
                $this->layout = '//layouts/print';
//                $this->render('rekap_pdf', array('model' => $model));
//                return;

                $mpdf = Yii::app()->ePdf->mpdf();
//                $mpdf->_setPageSize('A4', 'L');
                $mpdf->WriteHTML(
                        $this->render('rekap_pdf', array(
                            'model' => $model,
                                ), true));

                # Outputs ready PDF
                $mpdf->Output();
            }

            Yii::app()->user->setFlash('gajiDownloadError', "Slip Gaji tidak ditemukan");
        } else
            $this->render('rekap', array(
                'bulan' => $bulan,
                'tahun' => $tahun,
            ));
    }

    public function actionPegawaiAutocomplete() {
        if (strpos($_GET['term'], "(") === false) {
            $condition = $_GET['term'];
            $criteria = new CDbCriteria();
            $criteria->condition = " nama like '%$condition%'";
            $criteria->limit = 7;
            $info = Pegawai::model()->findAll($criteria);

            $arModels = array();
            foreach ($info as $model) {
                $arModels[] = array(
                    'id' => $model->id,
                    'nik' => $model->nik,
                    'label' => $model->nama,
                    'value' => $model->nama,
                );
            }

            echo CJSON::encode($arModels);
        }
    }

}
