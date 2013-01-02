<?php

/**
 * This is the model class for table "libur".
 *
 * The followings are the available columns in table 'libur':
 * @property integer $id
 * @property string $tanggal
 * @property string $nama
 * @property integer $recuring
 * @property string $created
 * @property string $updated
 */
class Libur extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Libur the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'libur';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tanggal, nama, recuring', 'required'),
            array('recuring', 'numerical', 'integerOnly' => true),
            array('nama', 'length', 'max' => 50),
            array('created, updated', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, tanggal, nama, recuring, created, updated', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'nama' => 'Nama',
            'recuring' => 'Recuring',
            'created' => 'Created',
            'updated' => 'Updated',
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
        $criteria->compare('nama', $this->nama, true);
        $criteria->compare('recuring', $this->recuring);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getRecuringOptions() {
        return array(
            1 => 'Yes',
            0 => 'No',
        );
    }

    public function getRecuringText($recuring = null) {
        $value = ($recuring === null) ? $this->recuring : $recuring;
        $recuringOptions = $this->getRecuringOptions();
        return isset($recuringOptions[$value]) ?
                $recuringOptions[$value] : "unknown status ({$value})";
    }

    public static function isLibur($tanggal) {
        $c1 = new CDbCriteria;
        $c1->compare('tanggal', $tanggal);
        $c1->compare('recuring', 0);
        $c2 = new CDbCriteria;
        $c2->compare('MONTH(tanggal)', date('m', strtotime($tanggal)));
        $c2->compare('Day(tanggal)', date('d', strtotime($tanggal)));
        $c2->compare('recuring', 1);
        return (Libur::model()->count($c1) + Libur::model()->count($c2) > 0) ? true : false;
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