
<h2>Daftar Gaji</h2>
<?php
$dataProvider = new CArrayDataProvider($model, array(
            'pagination' => false,
        ));
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'milestones-grid',
//    'pageSize' => 0,
    'dataProvider' => $dataProvider,
    'columns' => array(
//        'id',
        array(
            'header' => 'Tanggal',
            'name' => 'date',
            'headerHtmlOptions' => array('style' => 'text-align:center;'),
//            'footerHtmlOptions' => array('colspan' => '2'),
            'footer' => 'Jumlah Total',
        ),
        array(
            'header' => 'Nama Pegawai',
            'name' => 'pegawai_id',
            'type' => 'raw',
            'value' => 'CHtml::encode($data->pegawai->nama)',
            'headerHtmlOptions' => array('style' => 'text-align:center;'),
//            'footerHtmlOptions'=>array('style'=>'display:none'),
        ),  
        array(
            'header' => 'Tunjangan',
            'name' => 'jumlah_tunjangan',
            'type' => 'raw',
            'value' => '\'Rp. \' . number_format($data->jumlah_tunjangan, 2, \',\', \'.\')',
            'footer' => ($dataProvider->itemCount === 0) ? '' : 'Rp. ' . number_format(Gaji::totalJumlahTunjangan($dataProvider), 2, ',', '.'),
            'htmlOptions' => array('style' => 'text-align:right'),
            'headerHtmlOptions' => array('style' => 'text-align:center;'),
            'footerHtmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'header' => 'Gaji',
            'name' => 'jumlah_gaji',
            'type' => 'raw',
            'value' => '\'Rp. \' . number_format($data->jumlah_gaji, 2, \',\', \'.\')',
            'footer' => ($dataProvider->itemCount === 0) ? '' : 'Rp. ' . number_format(Gaji::totalJumlahGaji($dataProvider), 2, ',', '.'),
            'htmlOptions' => array('style' => 'text-align:right'),
            'headerHtmlOptions' => array('style' => 'text-align:center;'),
            'footerHtmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'header' => 'Total',
            'name' => 'gaji_tunjangan',
            'type' => 'raw',
            'value' => '\'Rp. \' . number_format($data->jumlah_tunjangan + $data->jumlah_gaji, 2, \',\', \'.\')',
            'footer' => ($dataProvider->itemCount === 0) ? '' : 'Rp. ' . number_format(Gaji::totalJumlahGajiTunjangan($dataProvider), 2, ',', '.'),
            'htmlOptions' => array('style' => 'text-align:right'),
            'headerHtmlOptions' => array('style' => 'text-align:center;'),
            'footerHtmlOptions' => array('style' => 'text-align:right;'),
        )
    ),
    'template' => '{items}',
));
?>