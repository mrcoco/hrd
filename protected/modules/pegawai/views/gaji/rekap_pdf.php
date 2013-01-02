
<h2>Daftar Gaji</h2>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'milestones-grid',
    'dataProvider' => new CArrayDataProvider($model),
    'columns' => array(
//        'id',
        array(
            'header' => 'Tanggal',
            'name' => 'date',
        ),
        array(
            'header' => 'Nama Pegawai',
            'name' => 'pegawai_id',
            'type' => 'raw',
            'value' => 'CHtml::encode($data->pegawai->nama)',
        ),
        array(
            'header' => 'Tunjangan',
            'name' => 'jumlah_tunjangan',
            'type' => 'raw',
            'value' => '\'Rp. \' . number_format($data->jumlah_tunjangan, 2, \',\', \'.\')',
        ),
        array(
            'header' => 'Gaji',
            'name' => 'jumlah_gaji',
            'type' => 'raw',
            'value' => '\'Rp. \' . number_format($data->jumlah_gaji, 2, \',\', \'.\')',
        ),
        array(
            'header' => 'Total',
            'name' => 'gaji_tunjangan',
            'type' => 'raw',
            'value' => '\'Rp. \' . number_format($data->jumlah_tunjangan + $data->jumlah_gaji, 2, \',\', \'.\')',
        ),
    ),
    'template' => '{items}',
));
?>