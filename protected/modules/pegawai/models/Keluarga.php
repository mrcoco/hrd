<?php

/**
 * This is the model class for table "keluarga".
 *
 * The followings are the available columns in table 'keluarga':
 * @property integer $id
 * @property integer $marital_status
 * @property integer $jumlah_anak
 * @property string $created
 * @property string $updated
 * @property integer $pegawai_id
 *
 * The followings are the available model relations:
 * @property Pegawai $pegawai
 */
class Keluarga extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Keluarga the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'keluarga';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('marital_status, pegawai_id', 'required'),
            array('marital_status, jumlah_anak, pegawai_id', 'numerical', 'integerOnly' => true),
            array('created, updated', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, marital_status, jumlah_anak, created, updated, pegawai_id', 'safe', 'on' => 'search'),
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
            'marital_status' => 'Marital Status',
            'jumlah_anak' => 'Jumlah Anak',
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
        $criteria->compare('marital_status', $this->marital_status);
        $criteria->compare('jumlah_anak', $this->jumlah_anak);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('pegawai_id', $this->pegawai_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getMaritalStatusOptions() {
        return array(
            0 => 'Belum Menikah',
            1 => 'Sudah Menikah',
        );
    }

    public function getMaritalStatusText() {
        $maritalStatusOptions = $this->getMaritalStatusOptions();

        return $maritalStatusOptions[$this->marital_status];
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