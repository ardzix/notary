<?php
/*
 * Project Name: notary
 * File Name: pra_realisasi_pick_customer_old
 * Created on: 23 Jan 14 - 15:39:21
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/form.js'></script>
    </head>

    <body>
        <?php
        if ($this->uri->segment(5) == 'error') {
            ?>
            <script>
                alert("Nomor transaksi telah digunakan");
            </script>
            <?php
        }
        ?>
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
                            <span class="ico-layout-7"></span>
                        </div>
                        <h1>Proses<small> Pra-Realisasi</small></h1>
                    </div>


                    <div class="row-fluid">
                        <div class="span12">
                            <div class="block">
                                <div class="head">
                                    <ul class="buttons">
                                        <li><a href="#" onClick="source('tabs');
                                                return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>                                
                                </div>  
                                <div class="data-fluid tabbable">                    
                                    <ul class="nav nav-tabs">
                                       <!-----------------------------------------------------------
                                        DAFTAR TRANSAKSI CUSTOMER 
                                        ----------------------------------------------------------->
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 17));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/entry">Daftar Transaksi Customer</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Transaksi Baru
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 18));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/entry/newTrans">Transaksi Baru</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Input Semua
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 19));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li class="active"><a href="<?= base_url() ?>proses/pra_realisasi/input_all/transaksi">Input semua</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Input Data
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 56));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li class="active"><a href="<?= base_url() ?>proses/pra_realisasi/input_data">Input semua</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Validasi Dokumen
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 20));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/validasi">Validasi Dokumen</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Monitoring Dokumen
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 21));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/monitoring_dokumen">Monitoring Dokumen</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Drop Pra-Realisasi
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 22));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/drop">Drop Pra-Realisasi</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>  
                                    <div class="tab-content">
                                        <div class="span12">   
                                            <div class="data-fluid">
                                                <form name="praRealisasi" action="<?= base_url() ?>control/edit/sertifikat" method="post">
                                                    <div class="row-fluid">

                                                        <div class="span12"> 
                                                            <div class="block">
                                                                <div class="head">                                
                                                                    <h2>Edit Sertifikat</h2>
                                                                </div>                                        
                                                                <div class="data-fluid">
                                                                    <input type="hidden" name="sertifikatId" value="<?= $sertifikat['SERTIFIKATID']; ?>" />
                                                                    <div class="row-form">
                                                                        <div class="span2">Objek Hukum:</div>
                                                                        <div class="span4">
                                                                            <select class="select" name="objhukum">
                                                                                <option value="<?= $sertifikat['TYPESERTIFIKATID']; ?>">
                                                                                    <?= $this->model_translate->dynamicTranslate('typesertifikat', 'TYPESERTIFIKATID', $sertifikat['TYPESERTIFIKATID'], 'TYPESERTIFIKATDESC'); ?>
                                                                                </option>
                                                                                 <?php
                                                                                foreach ($tipeSertifikat as $row):
                                                                                    ?>
                                                                                    <option value="<?= $row->TYPESERTIFIKATID ?>"><?= $row->TYPESERTIFIKATDESC ?></option>
                                                                                    <?php
                                                                                endforeach;
                                                                                ?>
                                                                            </select> </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">No Sertifikat:</div>
                                                                        <div class="span4">
                                                                            <input type="text" value="<?= $sertifikat['NOMOR']; ?>" name="noSertifikat"> </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Kelurahan/Desa:</div>
                                                                        <div class="span4">
                                                                            <input type="text" value="<?= $sertifikat['KEL_DESA']; ?>" name="kelDesa"> </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Kota/Kabupaten:</div>
                                                                        <div class="span4">
                                                                            <input type="text" value="<?= $sertifikat['KOTA_KAB']; ?>" name="kotaKab"> </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Atas Nama:</div>
                                                                        <div class="span4">
                                                                            <input type="text" value="<?= $sertifikat['NAMAPEMILIK']; ?>" name="atsNama"> </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Nama Penjual:</div>
                                                                        <div class="span4">
                                                                            <input type="text" value="<?= $sertifikat['NAMAPENJUAL']; ?>" name="penjual"> </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Nama Pembeli:</div>
                                                                        <div class="span4">
                                                                            <input type="text" value="<?= $sertifikat['NAMAPEMBELI']; ?>" name="pembeli"> </div>
                                                                    </div>
                                                                    <div class="toolbar bottom">
                                                                        <div class="btn-group">
                                                                            <button type="submit" class="btn">Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>                    
                                            </div> 
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
    <script>
        /*if (top.location != location) {
         top.location.href = document.location.href ;
         }*/
        $(function() {
            $('.dp1').datepicker({
                dateFormat: 'dd-mm-yy'
            });
        });


    </script>
</html>