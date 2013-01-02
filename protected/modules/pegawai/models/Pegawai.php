<?php

/**
 * This is the model class for table "pegawai".
 *
 * The followings are the available columns in table 'pegawai':
 * @property integer $id
 * @property string $nik
 * @property string $nama
 * @property string $alamat
 * @property string $jenis_kelamin
 * @property string $created
 * @property string $updated
 * @property integer $jabatan_id
 *
 * The followings are the available model relations:
 * @property Absen[] $absens
 * @property Bonus[] $bonuses
 * @property Gaji[] $gajis
 * @property Keluarga $keluarga
 * @property Lembur[] $lemburs
 * @property Jabatan $jabatan
 * @property Pendidikan[] $pendidikans
 * @property User $user
 */
class Pegawai extends CActiveRecord {

    public $file;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Pegawai the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pegawai';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nama, jabatan_id', 'required'),
            array('jabatan_id', 'numerical', 'integerOnly' => true),
            array('nik, nama', 'length', 'max' => 255),
            array('jenis_kelamin', 'length', 'max' => 1),
            array('file_name', 'length', 'max' => 45),
            array('alamat, created, updated', 'safe'),
            array('file', 'file', 'types' => 'jpg', 'allowEmpty' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nik, nama, alamat, jenis_kelamin, file_name, created, updated, jabatan_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'absens' => array(self::HAS_MANY, 'Absen', 'pegawai_id'),
            'bonuses' => array(self::HAS_MANY, 'Bonus', 'pegawai_id'),
            'gajis' => array(self::HAS_MANY, 'Gaji', 'pegawai_id'),
            'keluarga' => array(self::HAS_ONE, 'Keluarga', 'pegawai_id'),
            'lemburs' => array(self::HAS_MANY, 'Lembur', 'pegawai_id'),
            'jabatan' => array(self::BELONGS_TO, 'Jabatan', 'jabatan_id'),
            'pendidikans' => array(self::HAS_MANY, 'Pendidikan', 'pegawai_id'),
            'user' => array(self::HAS_ONE, 'User', 'pegawai_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'jenis_kelamin' => 'Jenis Kelamin',
            'file_name' => 'File Name',
            'created' => 'Created',
            'updated' => 'Updated',
            'jabatan_id' => 'Jabatan',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('nik', $this->nik, true);
        $criteria->compare('nama', $this->nama, true);
        $criteria->compare('alamat', $this->alamat, true);
        $criteria->compare('jenis_kelamin', $this->jenis_kelamin, true);
        $criteria->compare('file_name', $this->file_name, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('jabatan_id', $this->jabatan_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getJenisKelaminOptions() {
        return array(
            1 => 'Pria',
            0 => 'Wanita',
        );
    }

    public function getJenisKelaminText() {
        $jenisKelaminOprtions = $this->getJenisKelaminOptions();

        return $jenisKelaminOprtions[$this->jenis_kelamin];
    }

    public function getJabatanOptions() {
        return CHtml::listData(Jabatan::model()->findAll(), 'id', 'nama');
    }

    /**
     * Adds a pendidikan to this issue
     */
    public function addPendidikan($pendidikan) {
        $pendidikan->pegawai_id = $this->id;
        return $pendidikan->save();
    }

    public function getBonus($month = null) {
        $criteria = new CDbCriteria;
        $criteria->select = 'SUM(besar) AS bonus';
        $criteria->compare('pegawai_id', $this->id);
        if ($month !== null)
            $criteria->compare('MONTH(tanggal)', '=' . $month);
        return Bonus::model()->find($criteria)->getAttribute('bonus');
    }

    public function getLembur($month = null) {
        $criteria = new CDbCriteria;
        $criteria->select = 'SUM(biaya) AS lembur';
        $criteria->compare('pegawai_id', $this->id);
        if ($month !== null)
            $criteria->compare('MONTH(tanggal)', '=' . $month);
        return Lembur::model()->find($criteria)->getAttribute('lembur');
    }

    public function getTunjangan() {
        $biayaTunjangan = 0;
        $tunjanganJabatans = $this->jabatan->tunjanganJabatans;
        foreach ($tunjanganJabatans as $tunjanganJabatan) {
            if ($tunjanganJabatan->tunjangan->tipe_tunjangan_id == TipeTunjangan::DAILY) {
                $biayaTunjangan += $tunjanganJabatan->nilai * $this->getPresent(date('m'));
            } else if($tunjanganJabatan->tunjangan->tipe_tunjangan_id == TipeTunjangan::MONTHLY){
                $biayaTunjangan += $tunjanganJabatan->nilai;
            }             
        }
        return $biayaTunjangan;
    }

    public function getPresent($month = null) {
        $c = new CDbCriteria;
        $c->compare('is_present', 1);
        $c->compare('pegawai_id', $this->id);
        if ($month !== null)
            $c->compare('MONTH(tanggal)', $month);
        return Absen::model()->count($c);
    }

    public function behaviors() {
        return array(
            'timestamps' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created',
                'updateAttribute' => 'updated',
                'setUpdateOnCreate' => true,
            ),
        );
    }

}