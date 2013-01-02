<?php

/**
 * This is the model class for table "absen".
 *
 * The followings are the available columns in table 'absen':
 * @property integer $id
 * @property string $tanggal
 * @property string $keterangan
 * @property string $jam_masuk
 * @property string $jam_keluar
 * @property integer $is_present
 * @property string $created
 * @property string $updated
 * @property integer $pegawai_id
 * @property integer $cuti_id
 *
 * The followings are the available model relations:
 * @property Pegawai $pegawai
 * @property Cuti $cuti
 */
class Absen extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Absen the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'absen';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tanggal', 'unique', 'message' => 'This Day already exists.'),
            array('tanggal, keterangan, pegawai_id', 'required'),
            array('is_present, pegawai_id, cuti_id', 'numerical', 'integerOnly' => true),
            array('jam_masuk, jam_keluar, created, updated', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, tanggal, keterangan, jam_masuk, jam_keluar, is_present, created, updated, pegawai_id, cuti_id', 'safe', 'on' => 'search'),
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
            'cuti' => array(self::BELONGS_TO, 'Cuti', 'cuti_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'keterangan' => 'Keterangan',
            'jam_masuk' => 'Masuk',
            'jam_keluar' => 'Keluar',
            'is_present' => 'Is Present',
            'created' => 'Created',
            'updated' => 'Updated',
            'pegawai_id' => 'Pegawai',
            'cuti_id' => 'Alasan',
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
        $criteria->compare('tanggal', $this->tanggal, true);
        $criteria->compare('keterangan', $this->keterangan, true);
        $criteria->compare('jam_masuk', $this->jam_masuk, true);
        $criteria->compare('jam_keluar', $this->jam_keluar, true);
        $criteria->compare('is_present', $this->is_present);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('pegawai_id', $this->pegawai_id);
        $criteria->compare('cuti_id', $this->cuti_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
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