<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css"
              href="<?php echo Yii::app()->baseUrl; ?>/css/screen.css"
              media="screen, projection" />
        <link rel="stylesheet" type="text/css"
              href="<?php echo Yii::app()->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/ie.css" media="screen, projection" />
                <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/buttons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/icons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/tables.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/jquery.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/mbmenu.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/mbmenu_iestyles.css" />



        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">
            <div id="topnav">
                <div class="topnav_text">
                    <?php
                    echo CHtml::link('Home', array('/site/index'));
                    echo ' | ';
                    echo CHtml::link('About', array('/site/page', 'view' => 'about'));
                    echo ' | ';
                    echo CHtml::link('Contact', array('/site/contact'));
                    echo ' | ';
                    echo (Yii::app()->user->isGuest) ? CHtml::link('Login', array('/site/login')) : CHtml::link('Logout (' . Yii::app()->user->name . ')', array('/site/logout'));
                    ?>
                </div>
            </div>
            <div id="header">
                <div id="logo">
                    <?php echo CHtml::encode(Yii::app()->name); ?>
                </div>
            </div>
            <!-- header -->
            <div id="mainMbMenu">
                <?php
                $this->widget('ext.mbmenu.MbMenu', array(
                    'items' => array(
                        array(
                            'label' => 'Pegawai',
                            'url' => array('/pegawai/pegawai/admin'),
                            'visible' => !Yii::app()->user->isGuest,
                            'itemOptions' => array('class' => 'first'),
                        //                            'image' => Yii::app()->request->baseUrl . '/images/icon-asset.png'
                        ),
                        array(
                            'label' => 'Master',
                            'visible' => !Yii::app()->user->isGuest,
                            //                            'image' => Yii::app()->request->baseUrl . '/images/icon-administration.png',
                            'items' => array(
                                array(
                                    'label' => 'Alasan Absen',
                                    'url' => array('/pegawai/cuti/admin'),
//                                    'image' => Yii::app()->request->baseUrl . '/images/icon-administration.png',
                                    'visible' => !Yii::app()->user->isGuest,
                                ),
                                array(
                                    'label' => 'Tipe Tunjangan',
                                    'url' => array('/pegawai/tipeTunjangan/admin'),
//                                    'image' => Yii::app()->request->baseUrl . '/images/icon-administration.png',
                                    'visible' => !Yii::app()->user->isGuest,
                                ),
                                array(
                                    'label' => 'Tunjangan',
                                    'url' => array('/pegawai/tunjangan/admin'),
//                                    'image' => Yii::app()->request->baseUrl . '/images/icon-administration.png',
                                    'visible' => !Yii::app()->user->isGuest,
                                ),
                                array(
                                    'label' => 'Jabatan',
                                    'url' => array('/pegawai/jabatan/admin'),
                                    'visible' => !Yii::app()->user->isGuest,
                                ),
                                array(
                                    'label' => 'Pajak',
                                    'url' => array('/pegawai/pajak/admin'),
                                    //                                    'image' => Yii::app()->request->baseUrl . '/images/icon-administration.png',
                                    'visible' => !Yii::app()->user->isGuest,
                                ),
                                array(
                                    'label' => 'Libur',
                                    'url' => array('/pegawai/libur/admin'),
//                                    'image' => Yii::app()->request->baseUrl . '/images/icon-administration.png',
                                    'visible' => !Yii::app()->user->isGuest,
                                ),
                            ),
                        ),
                        array(
                            'label' => 'Admin',
                            'visible' => !Yii::app()->user->isGuest,
                            'items' => array(
                                array(
                                    'label' => 'Rights',
                                    'url' => array('/rights'),
                                    'visible' => Yii::app()->user->checkAccess(Rights::module()->superuserName)
                                ),
                                array(
                                    'label' => 'User',
                                    'url' => array('/pegawai/user/admin'),
                                    'visible' => !Yii::app()->user->isGuest,
                                ),
                            ),
                        ),
                    ),
                ));
                ?>
            </div>
            <!--mainmenu -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?>
                <!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div id="footer">
                <?php echo Yii::app()->params['copyrightInfo']; ?>
                <br /> All Rights Reserved.<br />
                <?php echo Yii::powered(); ?>
            </div>
            <!-- footer -->

        </div>
        <!-- page -->

    </body>
</html>
