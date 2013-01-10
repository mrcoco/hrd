<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */

$this->breadcrumbs = array(
    'Pegawais' => array('admin'),
    $model->nama,
);

$this->menu = array(
    array('label' => 'List Pegawai', 'url' => array('admin')),
    array('label' => 'Buat Pegawai', 'url' => array('create')),
    array('label' => 'Sunting Pegawai', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Hapus Pegawai', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Kelola Pegawai', 'url' => array('admin')),
    array('label' => 'Buat Absen', 'url' => array('absen/create', 'pid' => $model->id)),
    array('label' => 'Buat Lembur', 'url' => array('lembur/create', 'pid' => $model->id)),
    array('label' => 'Buat Perjalanan Dinas', 'url' => array('perjalananDinas/create', 'pid' => $model->id)),
    array('label' => 'Buat Bonus', 'url' => array('bonus/create', 'pid' => $model->id)),
    array('label' => 'Buat Gaji', 'url' => array('gaji/create', 'pid' => $model->id)),
    array('label' => 'Download Slip Gaji', 'url' => array('gaji/download', 'pid' => $model->id)),
);
?>

<h1>Lihat Pegawai <?php echo $model->nama; ?></h1>

<div class="container">
    <div class="span-5"><?php echo CHtml::image(Yii::app()->baseUrl . Yii::app()->params['uploads'] . $model->file_name, $model->file_name, array('style' => 'max-width: 100%;')); ?></div>
    <div class="span-13 ">
        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'attributes' => array(
                'nik',
                'nama',
                'alamat',
                array(
                    'name' => 'jenis_kelamin',
                    'type' => 'raw',
                    'value' => CHtml::encode($model->getJenisKelaminText())
                ),
                array(
                    'name' => 'jabatan_id',
                    'type' => 'raw',
                    'value' => CHtml::link(CHtml::encode($model->jabatan->nama), array('jabatan/view', 'id' => $model->jabatan->id))
                ),
            ),
        ));
        ?>
    </div>
</div>
<br/>
<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs' => array(
        'Pendidikan' => $this->renderPartial('_pendidikans', array('pendidikans' => $model->pendidikans, 'pendidikan' => $pendidikan), $this),
//        'Pelatihan' => $this->renderPartial('_pelatihans', array('pelatihans' => $model->pelatihans,), $this),
//        'Penghargaan' => $this->renderPartial('_penghargaans', array('penghargaans' => $model->penghargaans,), $this),
        'Keluarga' => $this->renderPartial('_keluarga', array('keluarga' => $model->keluarga,), $this),
    ),
    'options' => array(
        'collapsible' => false,
    ),
    'htmlOptions' => array('class' => 'shadowtabs'),
));
?>

