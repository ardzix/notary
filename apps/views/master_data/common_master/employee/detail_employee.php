<?php
/*
 * Project Name: notary
 * File Name: detail_employee
 * Created on: 16 Jan 14 - 14:29:09
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?><!DOCTYPE html>
<html lang="en">
    <!-- header start here -->
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/other/faq.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/highlight/jquery.highlight-4.js'></script>
        <script type='text/javascript' src="<?= NOTARY_ASSETS ?>js/plugins/select/select2.min.js"></script>

    </head>

    <body>    
        <div id="loader"><img src="<?= NOTARY_ASSETS ?>img/loader.gif"/></div>
        <div class="wrapper">

            <!-- sidebar menu start here -->
            <?= $this->load->view('slice/sidebar'); ?>

            <div class="body">

                <!-- header menu start here -->
                <?= $this->load->view('slice/header-menu'); ?>

                <!-- content start here -->
                <div class="content">

                    <div class="page-header">
                        <div class="icon">
                            <span class="ico-question-sign"></span>
                        </div>
                        <h1>Detail <small>Employee</small></h1>
                    </div>


                    <div class="row-fluid">
                        <div class="span4">

                            <div class="block">                    
                                <div class="head blue">
                                    <div class="icon"><span class="ico-star"></span></div>
                                    <h2>Employee Photo's</h2>
                                </div>
                                <div class="data-fluid">
                                    <?php
                                    if ($foto['NAMAFILEIMAGE'] ==  NULL) {
                                        ?>
                                        <img src="<?= NOTARY_ASSETS . 'images/employee/nopic.jpg' ?>" width="100%" />
                                        <?php
                                    } else {
                                        ?>
                                        <img src="<?= NOTARY_ASSETS . 'images/employee/' . $foto['NAMAFILEIMAGE']; ?>" width="100%" /> 
                                        <?php
                                    }
                                    ?>   
                                </div>
                            </div>

                            <div class="block">                    
                                <div class="head blue">
                                    <div class="icon"><span class="ico-star"></span></div>
                                    <h2>Employee Information</h2>
                                </div>
                                <div class="data-fluid">
                                    <ul class="list" id="faqListController">
                                        <li><a href="#faq-1">Basic Information</a></li>
                                        <li><a href="#faq-2">Detail Information</a></li>
                                    </ul>                        
                                </div>
                            </div>

                        </div>
                        <div class="span8">

                            <div class="block">
                                <div class="toolbar">
                                    <div class="right tar">
                                        <div class="btn-group">
                                            <button class="btn tip" id="faqOpenAll" data-original-title="Open all"><span class="icon-chevron-down icon-white"></span></button>
                                            <button class="btn tip" id="faqCloseAll" data-original-title="Close all"><span class="icon-chevron-up icon-white"></span></button>
                                            <button class="btn tip" id="faqRemoveHighlights" data-original-title="Remove highlights"><span class="icon-remove icon-white"></span></button>
                                        </div>
                                    </div>                        
                                </div>

                                <div class="data-fluid faq">
                                    <div class="item" id="faq-1">
                                        <div class="title"><u>Basic Information</u></div>
                                        <div class="text">
                                            <table width="100%" border="0">
                                                <tr>
                                                    <td width="22%">NIP</td>
                                                    <td width="3%">:</td>
                                                    <td width="75%"><?= $basic['NIP'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="22%">Nama</td>
                                                    <td width="3%">:</td>
                                                    <td width="75%"><?= $basic['NAMALENGKAP'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Lahir</td>
                                                    <td>:</td>
                                                    <td><?
                                                        if ($basic['TANGGALLAHIR'] != 0000 - 00 - 00) {
                                                            echo date('d-m-Y', strtotime($basic['TANGGALLAHIR']));
                                                        } else {
                                                            echo "-";
                                                        }
                                                        ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Gender</td>
                                                    <td>:</td>
                                                    <td><?= $this->model_translate->dynamicTranslate('gender', 'GENDER', $basic['GENDER'], 'GENDERDESC') ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tipe ID</td>
                                                    <td>:</td>
                                                    <td><?= $this->model_translate->dynamicTranslate('identitaspersonal', 'IDENTITASPERSONALID', $basic['IDENTITASPERSONALID'], 'IDENTITASPERSONALDESC'); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>No ID</td>
                                                    <td>:</td>
                                                    <td><?= $basic['NOIDENTITASPERSONAL'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Title</td>
                                                    <td>:</td>
                                                    <td><?= $this->model_translate->dynamicTranslate('title', 'TITLEID', $basic['TITLEID'], 'TITLEDESC') ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jabatan</td>
                                                    <td>:</td>
                                                    <td><?= $this->model_translate->dynamicTranslate('jabatan', 'JABATANID', $basic['JABATANID'], 'JABATANDESC') ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="item" id="faq-2">
                                        <div class="title"><u>Detail Information</u></div>
                                        <div class="text">
                                            <table width="100%" border="0">
                                                <tr>
                                                    <td width="22%">Jalan</td>
                                                    <td width="3%">:</td>
                                                    <td width="75%"><?= $detail['JALAN'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Gedung</td>
                                                    <td>:</td>
                                                    <td><?= $detail['GEDUNG'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Lantai</td>
                                                    <td>:</td>
                                                    <td><?= $detail['LANTAIGEDUNG'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>RT</td>
                                                    <td>:</td>
                                                    <td><?= $detail['RT'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>RW</td>
                                                    <td>:</td>
                                                    <td><?= $detail['RW'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kelurahan</td>
                                                    <td>:</td>
                                                    <td><?= $detail['KELURAHANDESA'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kecamatan</td>
                                                    <td>:</td>
                                                    <td><?= $detail['KECAMATAN'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kab/Kota</td>
                                                    <td>:</td>
                                                    <td><?= $detail['DATI2'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Provinsi</td>
                                                    <td>:</td>
                                                    <td><?= $detail['DATI1'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Negara</td>
                                                    <td>:</td>
                                                    <td><?= $detail['NEGARA'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kode POS</td>
                                                    <td>:</td>
                                                    <td><?= $detail['KODEPOS'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>No. HP</td>
                                                    <td>:</td>
                                                    <td><?= $detail['NOHP'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>:</td>
                                                    <td><?= $detail['EMAIL'] ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>                    

                                </div>

                            </div>

                            <?= $this->load->view('slice/tambal'); ?>   
                        </div>                


                    </div>
                </div>
            </div>
    </body>
</html>

