<?php

/**
 * This is the model class for table "gaji".
 *
 * The followings are the available columns in table 'gaji':
 * @property integer $id
 * @property double $jumlah_gaji
 * @property double $jumlah_tunjangan
 * @property double $jumlah_pajak
 * @property double $jumlah_lembur
 * @property double $jumlah_bonus
 * @property double $total_gaji_bersih
 * @property string $date
 * @property string $created
 * @property string $updated
 * @property integer $pegawai_id
 *
 * The followings are the available model relations:
 * @property Pegawai $pegawai
 */
class Gaji extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Gaji the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'gaji';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('jumlah_gaji, jumlah_tunjangan, jumlah_pajak, total_gaji_bersih, date, pegawai_id', 'required'),
            array('pegawai_id', 'numerical', 'integerOnly' => true),
            array('jumlah_gaji, jumlah_tunjangan, jumlah_pajak, jumlah_lembur, jumlah_bonus, total_gaji_bersih', 'numerical'),
            array('created, updated', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, jumlah_gaji, jumlah_tunjangan, jumlah_pajak, jumlah_lembur, jumlah_bonus, total_gaji_bersih, date, created, updated, pegawai_id', 'safe', 'on' => 'search'),
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
            'jumlah_gaji' => 'Jumlah Gaji',
            'jumlah_tunjangan' => 'Jumlah Tunjangan',
            'jumlah_pajak' => 'Jumlah Pajak',
            'jumlah_lembur' => 'Jumlah Lembur',
            'jumlah_bonus' => 'Jumlah Bonus',
            'total_gaji_bersih' => 'Total Gaji Bersih',
            'date' => 'Date',
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
        $criteria->compare('jumlah_gaji', $this->jumlah_gaji);
        $criteria->compare('jumlah_tunjangan', $this->jumlah_tunjangan);
        $criteria->compare('jumlah_pajak', $this->jumlah_pajak);
        $criteria->compare('jumlah_lembur', $this->jumlah_lembur);
        $criteria->compare('jumlah_bonus', $this->jumlah_bonus);
        $criteria->compare('total_gaji_bersih', $this->total_gaji_bersih);
        $criteria->compare('date', $this->date, true);
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

    public function getPegawaiOptions() {
        return CHtml::listData(Pegawai::model()->findAll(), 'id', 'nama');
    }

    public function getMonthOptions() {
        return array(
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
    }

    public function getYearOptions() {
        $tahun = date('Y');

        $data = array();
        for ($i = 0; $i < 5; $i++) {
            $data[$tahun - $i] = $tahun - $i;
        }
        return $data;
    }

    public static function totalJumlahGaji($provider) {
        $total = 0;
        foreach ($provider->data as $item)
            $total += $item->jumlah_gaji;
        return $total;
    }

    public static function totalJumlahTunjangan($provider) {
        $total = 0;
        foreach ($provider->data as $item)
            $total += $item->jumlah_tunjangan;
        return $total;
    }

    public static function totalJumlahGajiTunjangan($provider) {
        $total = 0;
        foreach ($provider->data as $item)
            $total += ($item->jumlah_tunjangan + $item->jumlah_gaji);
        return $total;
    }

}