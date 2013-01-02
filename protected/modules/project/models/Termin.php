<?php

/**
 * This is the model class for table "termin".
 *
 * The followings are the available columns in table 'termin':
 * @property integer $id
 * @property string $name
 * @property integer $percentage
 * @property double $cost
 * @property string $summary
 * @property string $created
 * @property string $updated
 * @property integer $project_id
 *
 * The followings are the available model relations:
 * @property InvoiceDocument[] $invoiceDocuments
 * @property PaymentDocument[] $paymentDocuments
 * @property Project $project
 */
class Termin extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Termin the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'termin';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('project_id', 'required'),
            array('percentage, project_id', 'numerical', 'integerOnly' => true),
            array('name, summary', 'length', 'max' => 255),
            array('cost', 'numerical'),
            array('created, updated', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, percentage, cost, summary, created, updated, project_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'invoiceDocuments' => array(self::HAS_MANY, 'InvoiceDocument', 'termin_id'),
            'paymentDocuments' => array(self::HAS_MANY, 'PaymentDocument', 'termin_id'),
            'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'percentage' => 'Percentage',
            'cost' => 'Cost',
            'summary' => 'Summary',
            'created' => 'Created',
            'updated' => 'Updated',
            'project_id' => 'Project',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('percentage', $this->percentage);
        $criteria->compare('cost', $this->cost);
        $criteria->compare('summary', $this->summary, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('project_id', $this->project_id);

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