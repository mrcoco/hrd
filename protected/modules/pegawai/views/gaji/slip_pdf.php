
<h1>Slip Gaji</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id',
        'jumlah_gaji',
        'jumlah_tunjangan',
        'jumlah_pajak',
        'jumlah_lembur',
        'jumlah_bonus',
        'total_gaji_bersih',
        'date',
        'pegawai_id',
    ),
));
?>
