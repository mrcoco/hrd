<?php

/**
 * This is the model class for table "bonus".
 *
 * The followings are the available columns in table 'bonus':
 * @property integer $id
 * @property string $nama
 * @property double $besar
 * @property string $keterangan
 * @property string $tanggal
 * @property string $created
 * @property string $updated
 * @property integer $pegawai_id
 *
 * The followings are the available model relations:
 * @property Pegawai $pegawai
 */
class Bonus extends CActiveRecord {
    public $bonus;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Bonus the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'bonus';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nama, besar, tanggal, pegawai_id', 'required'),
            array('pegawai_id', 'numerical', 'integerOnly' => true),
            array('besar', 'numerical'),
            array('nama', 'length', 'max' => 50),
            array('keterangan, created, updated', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nama, besar, keterangan, tanggal, created, updated, pegawai_id', 'safe', 'on' => 'search'),
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
            'nama' => 'Nama',
            'besar' => 'Besar',
            'keterangan' => 'Keterangan',
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
        $criteria->compare('nama', $this->nama, true);
        $criteria->compare('besar', $this->besar);
        $criteria->compare('keterangan', $this->keterangan, true);
        $criteria->compare('tanggal', $this->tanggal, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('pegawai_id', $this->pegawai_id);

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