
<?php

$this->widget('zii.widgets.CDetailView', array(
    'data' => $keluarga,
    'attributes' => array(
//        'marital_status',
        array(
            'name' => 'marital_status',
            'type' => 'raw',
            'value' => CHtml::encode($keluarga->getMaritalStatusText())
        ),
        'jumlah_anak',
//        'created',
//        'updated',
//        'pegawai_id',
    ),
));
?>
