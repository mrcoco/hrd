
<h1>Slip Gaji</h1>
<hr />
<table width="100%">
    <tbody>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?php echo date('d/m/Y', strtotime($model->date)); ?></td>
        </tr>
        <tr>
            <td>Nama Pegawai</td>
            <td>:</td>
            <td><?php echo $model->pegawai->nama; ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?php echo $model->pegawai->jabatan->nama; ?></td>
        </tr>
        <tr>
            <td colspan="3"><hr /></pre></td>
        </tr>
        <tr>
            <td>Gaji Pokok</td>
            <td>:</td>
            <td><?php echo 'Rp. ' . number_format($model->jumlah_gaji, 2, '.', ','); ?></td>
        </tr>
        <tr>
            <td>Tunjangan</td>
            <td>:</td>
            <td><?php echo 'Rp. ' . number_format($model->jumlah_tunjangan, 2, '.', ','); ?></td>
        </tr>
        <tr>
            <td>Lembur</td>
            <td>:</td>
            <td><?php echo 'Rp. ' . number_format($model->jumlah_lembur, 2, '.', ','); ?></td>
        </tr>
        <tr>
            <td>Bonus</td>
            <td>:</td>
            <td><?php echo 'Rp. ' . number_format($model->jumlah_bonus, 2, '.', ','); ?></td>
        </tr>
        <tr>
            <td>Pajak</td>
            <td>:</td>
            <td><?php echo 'Rp. ' . number_format($model->jumlah_pajak, 2, '.', ','); ?></td>
        </tr>
        <tr>
            <td>Jumlah Keseluruhan</td>
            <td>:</td>
            <td><?php echo 'Rp. ' . number_format($model->total_gaji_bersih, 2, '.', ','); ?></td>
        </tr>
    </tbody>
</table>