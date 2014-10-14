<?php

/*
 * Project Name: notary
 * File Name: customer_detail
 * Created on: 20 Jan 14 - 14:55:00
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
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
                        <h1>Detail <small>Customer</small></h1>
                    </div>


                    <div class="row-fluid">
                        <div class="span4">

                            <!--                            <div class="block">                    
                                                            <div class="head blue">
                                                                <div class="icon"><span class="ico-star"></span></div>
                                                                <h2>Employee Photo's</h2>
                                                            </div>
                                                            <div class="data-fluid">
                                                                <img src="<?= NOTARY_ASSETS . 'images/employee/' . $list3['NAMAFILEIMAGE']; ?>" width="100%" />                       
                                                            </div>
                                                        </div>-->

                            <div class="block">                    
                                <div class="head blue">
                                    <div class="icon"><span class="ico-star"></span></div>
                                    <h2>Customer Information</h2>
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
                                                    <td width="22%">Nama</td>
                                                    <td width="3%">:</td>
                                                    <td width="75%"><?= $basic['NAMACUST'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Lahir</td>
                                                    <td>:</td>
                                                    <td><?php
                                                        if ($basic['TANGGALLAHIRCUST'] != 0000 - 00 - 00) {
                                                            echo date('d-m-Y', strtotime($basic['TANGGALLAHIRCUST']));
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
                                                    <td><?= $basic['NOIDPERSONALCUST'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tipe Customer</td>
                                                    <td>:</td>
                                                    <td><?= $this->model_translate->dynamicTranslate('tipecustomer', 'TIPECUSTID', $basic['TIPECUSTID'], 'TIPECUSTDESC'); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Pekerjaan</td>
                                                    <td>:</td>
                                                    <td><?= $this->model_translate->dynamicTranslate('pekerjaan', 'PEKERJAANID', $basic['PEKERJAANID'], 'PEKERJAANDESC'); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="item" id="faq-2">
                                        <div class="title"><u>Detail Information</u></div>
                                        <div class="text">
                                            <table width="100%" border="0">
                                                <tr>
                                                    <td width="22%">Nama Perusahaan</td>
                                                    <td width="3%">:</td>
                                                    <td width="75%"><?= $detail['NAMAPERUSAHAAN'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jalan</td>
                                                    <td>:</td>
                                                    <td><?= $detail['JALANCUST'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Gedung</td>
                                                    <td>:</td>
                                                    <td><?= $detail['GEDUNGCUST'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Lantai</td>
                                                    <td>:</td>
                                                    <td><?= $detail['LANTAICUST'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>RT</td>
                                                    <td>:</td>
                                                    <td><?= $detail['RTCUST'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>RW</td>
                                                    <td>:</td>
                                                    <td><?= $detail['RWCUST'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kelurahan</td>
                                                    <td>:</td>
                                                    <td><?= $detail['KELURAHANCUST'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kecamatan</td>
                                                    <td>:</td>
                                                    <td><?= $detail['KECAMATANCUST'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kab/Kota</td>
                                                    <td>:</td>
                                                    <td><?= $detail['DATI2CUST'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Provinsi</td>
                                                    <td>:</td>
                                                    <td><?= $detail['DATI1CUST'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Negara</td>
                                                    <td>:</td>
                                                    <td><?= $detail['NEGARACUST'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kode POS</td>
                                                    <td>:</td>
                                                    <td><?= $detail['KODEPOSCUST'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>No. Fax</td>
                                                    <td>:</td>
                                                    <td><?= $detail['NOFAXCUST'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>No. HP</td>
                                                    <td>:</td>
                                                    <td><?= $detail['NOHPCUST'] ?></td>
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
                        </div>
                        <?= $this->load->view('slice/tambal'); ?>   
                    </div>     
                </div>
            </div>
        </div>
    </body>
</html>