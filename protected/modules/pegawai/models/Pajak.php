<?php

/**
 * This is the model class for table "pajak".
 *
 * The followings are the available columns in table 'pajak':
 * @property integer $id
 * @property string $nama
 * @property double $besaran
 * @property double $min_gaji
 * @property double $max_gaji
 * @property string $created
 * @property string $updated
 */
class Pajak extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Pajak the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pajak';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nama, besaran, min_gaji, max_gaji', 'required'),
            array('besaran, min_gaji, max_gaji', 'numerical'),
            array('nama', 'length', 'max' => 100),
            array('created, updated', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nama, besaran, min_gaji, max_gaji, created, updated', 'safe', 'on' => 'search'),
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
            'nama' => 'Nama',
            'besaran' => 'Besaran',
            'min_gaji' => 'Min Gaji',
            'max_gaji' => 'Max Gaji',
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
        $criteria->compare('nama', $this->nama, true);
        $criteria->compare('besaran', $this->besaran);
        $criteria->compare('min_gaji', $this->min_gaji);
        $criteria->compare('max_gaji', $this->max_gaji);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);

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


    public static function getTarifPajak($pkp) {
        $tarifpajak = Pajak::model()->findAll();
        if ($tarifpajak != null) {
            foreach ($tarifpajak as $pajak) {
                if ($pkp > $pajak->min_gaji && $pkp <= $pajak->max_gaji) {
                    $tarifpajak = $pajak->besaran * $pkp / 100;
                    break;
                } else {
                    $tarifpajak = 35 * $pkp / 100;
                }
            }
        }
        return $tarifpajak / 12;
    }
}