<?php

/**
 * This is the model class for table "lembur".
 *
 * The followings are the available columns in table 'lembur':
 * @property integer $id
 * @property integer $lama
 * @property double $biaya
 * @property string $tanggal
 * @property string $created
 * @property string $updated
 * @property integer $pegawai_id
 *
 * The followings are the available model relations:
 * @property Pegawai $pegawai
 */
class Lembur extends CActiveRecord {

    public $lembur;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Lembur the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'lembur';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tanggal', 'unique', 'message' => 'This Day already exists.'),
            array('lama, biaya, tanggal, pegawai_id', 'required'),
            array('lama, pegawai_id', 'numerical', 'integerOnly' => true),
            array('biaya', 'numerical'),
            array('created, updated', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, lama, biaya, tanggal, created, updated, pegawai_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pegawai' => array(self::BELONGS_TO, 'Pegawai', 'pegawai_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'lama' => 'Waktu Lembur',
            'biaya' => 'Biaya',
            'tanggal' => 'Tanggal',
            'created' => 'Created',
            'updated' => 'Updated',
            'pegawai_id' => 'Pegawai',
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
        $criteria->compare('lama', $this->lama);
        $criteria->compare('biaya', $this->biaya);
        $criteria->compare('tanggal', $this->tanggal, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('pegawai_id', $this->pegawai_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    private function isWeekend($date) {
        $weekDay = date('w', strtotime($date));
        return ($weekDay == 0 || $weekDay == 6);
    }

    /*
     * Upah sejam adalah 1/173 kali upah sebulan.
     * Angka 1/173 didasarkan pada perhitungan sbb:
     * Dalam satu tahun  ada  52 minggu
     * Jadi dalam 1 bulan =  52/12  = 4,333333  minggu.
     * Total jam kerja/minggu = 40 jam
     * Jadi  Total jam kerja dalam 1 bulan =  40 X 4,33  =  173,33 dibulatkan menjadi 173 jam. 
     * maka  untuk menghitung upah per jam yaitu upah perbulan / 173
     */

    public function countBiaya($tanggal, $jam, $workDay = 5) {
        $biaya = 0;
        $lemburPHour = $this->pegawai->jabatan->gaji / 173;
        if ($this->isWeekend($tanggal) || Libur::isLibur($tanggal)) {
            $jam = $jam - 1;
            $l1 = 1.5 * 1;
            $l2 = 2 * $jam;
            $biaya = ($l1 + $l2) * $lemburPHour;
        } else {
            if ($workDay == 5) {
                if ($jam >= 8) {
                    $l2 = 2 * 8 * $lemburPHour;
                    if ($jam >= 9) {
                        $l3 = 3 * 1 * $lemburPHour;
                        if ($jam >= 10) {
                            $l4 = 4 * ($jam - 9) * $lemburPHour;
                        }
                    }
                } else {
                    $l2 = 2 * $jam;
                }
                $biaya = $l2 + $l3 + $l4;
            } else {
                if ($jam >= 7) {
                    $l2 = 2 * 7 * $lemburPHour;
                    if ($jam >= 8) {
                        $l3 = 3 * 1 * $lemburPHour;
                        if ($jam >= 9) {
                            $l4 = 4 * ($jam - 8) * $lemburPHour;
                        }
                    }
                } else {
                    $l2 = 2 * $jam;
                }
                $biaya = $l2 + $l3 + $l4;
            }
        }
        return $biaya;
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