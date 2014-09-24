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
                                                <form name="praRealisasi" action="<?= base_url() ?>control/edit/prosestran" method="post">
                                                    <div class="row-fluid">

                                                        <div class="span12"> 
                                                            <div class="block">
                                                                <div class="head">                                
                                                                    <h2>Edit Proses</h2>
                                                                </div>                                        
                                                                <div class="data-fluid">
                                                                    <input type="hidden" name="prosestranId" value="<?= $this->uri->segment(5) ?>" />
                                                                    <input type="hidden" name="aktatranId" value="<?= $prosestran['AKTATRANID']; ?>" />
                                                                    <div class="row-form">
                                                                        <div class="span2">No Urut Proses:</div>
                                                                        <div class="span4">
                                                                            <input type="text" value="<?= $prosestran['NOMORURUT']; ?>" name="noProses"> </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Nama Proses:</div>
                                                                        <div class="span4">
                                                                            <select class="select" name="proses">
                                                                                <option value="<?= $prosestran['PROSESID']; ?>">
                                                                                    <?= $this->model_translate->dynamicTranslate('proses', 'PROSESID', $prosestran['PROSESID'], 'PROSESDESC'); ?>
                                                                                </option>
                                                                                <?php foreach ($proses as $row):
                                                                                    ?>
                                                                                    <option value="<?= $row->PROSESID ?>"><?= $row->PROSESDESC ?></option>
                                                                                    <?php
                                                                                endforeach;
                                                                                ?>
                                                                            </select> </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">PJ Proses:</div>
                                                                        <div class="span4">
                                                                            <select class="select" name="pjproses">
                                                                                <option value="<?= $prosestran['EMPLOYEEID']; ?>">
                                                                                    <?= $this->model_translate->dynamicTranslate('employee', 'EMPLOYEEID', $prosestran['EMPLOYEEID'], 'NAMALENGKAP'); ?>
                                                                                </option>
                                                                                <?php foreach ($proses as $row):
                                                                                    ?>
                                                                                    <option value="<?= $row->PROSESID ?>"><?= $row->PROSESDESC ?></option>
                                                                                    <?php
                                                                                endforeach;
                                                                                ?>
                                                                            </select> </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Tanggal Masuk:</div>
                                                                        <div class="span4">
                                                                            <input type="text" value="<?= date('d-m-Y', strtotime($prosestran['TGLMASUK'])); ?>" name="tglMasuk" class="dp1" /></div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Tanggal Selesai:</div>
                                                                        <div class="span4">
                                                                            <input type="text" value="<?php if($prosestran['TGLSELESAI'] != NULL){
                                                                            echo date('d-m-Y', strtotime($prosestran['TGLSELESAI'])); } ?>" name="tglKeluar" class="dp1" /></div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Tanggal Diserahkan:</div>
                                                                        <div class="span4">
                                                                            <input type="text" value="<?php if($prosestran['TGLPENYERAHAN'] != NULL){
                                                                            echo date('d-m-Y', strtotime($prosestran['TGLPENYERAHAN'])); }
                                                                            ?>" name="tglDiserahkan" class="dp1" /></div>
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