<?php

/**
 * This is the model class for table "tunjangan_jabatan".
 *
 * The followings are the available columns in table 'tunjangan_jabatan':
 * @property integer $id
 * @property double $nilai
 * @property string $created
 * @property string $updated
 * @property integer $jabatan_id
 * @property integer $tunjangan_id
 *
 * The followings are the available model relations:
 * @property Tunjangan $tunjangan
 * @property Jabatan $jabatan
 */
class TunjanganJabatan extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TunjanganJabatan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tunjangan_jabatan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('jabatan_id, tunjangan_id', 'required'),
            array('jabatan_id, tunjangan_id', 'numerical', 'integerOnly' => true),
            array('nilai', 'numerical'),
            array('created, updated', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nilai, created, updated, jabatan_id, tunjangan_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tunjangan' => array(self::BELONGS_TO, 'Tunjangan', 'tunjangan_id'),
            'jabatan' => array(self::BELONGS_TO, 'Jabatan', 'jabatan_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'nilai' => 'Nilai',
            'created' => 'Created',
            'updated' => 'Updated',
            'jabatan_id' => 'Nama Jabatan',
            'tunjangan_id' => 'Jenis Tunjangan',
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
        $criteria->compare('nilai', $this->nilai);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('jabatan_id', $this->jabatan_id);
        $criteria->compare('tunjangan_id', $this->tunjangan_id);

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