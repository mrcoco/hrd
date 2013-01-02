<?php

/**
 * This is the model class for table "tunjangan".
 *
 * The followings are the available columns in table 'tunjangan':
 * @property integer $id
 * @property string $nama
 * @property string $keterangan
 * @property string $created
 * @property string $updated
 * @property integer $tipe_tunjangan_id
 *
 * The followings are the available model relations:
 * @property TipeTunjangan $tipeTunjangan
 * @property TunjanganJabatan[] $tunjanganJabatans
 */
class Tunjangan extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Tunjangan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tunjangan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nama, tipe_tunjangan_id', 'required'),
            array('tipe_tunjangan_id', 'numerical', 'integerOnly' => true),
            array('nama, keterangan', 'length', 'max' => 30),
            array('created, updated', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nama, keterangan, created, updated, tipe_tunjangan_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tipeTunjangan' => array(self::BELONGS_TO, 'TipeTunjangan', 'tipe_tunjangan_id'),
            'tunjanganJabatans' => array(self::HAS_MANY, 'TunjanganJabatan', 'tunjangan_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'nama' => 'Nama',
            'keterangan' => 'Keterangan',
            'created' => 'Created',
            'updated' => 'Updated',
            'tipe_tunjangan_id' => 'Jenis Tunjangan',
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
        $criteria->compare('keterangan', $this->keterangan, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('tipe_tunjangan_id', $this->tipe_tunjangan_id);

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