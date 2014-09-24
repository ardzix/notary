<?php
/*
 * Project Name: notary
 * File Name: realisasi_penyerahan_dokumen
 * Created on: 29 Jan 14 - 8:22:07
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <!-- header tag start here -->
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <!-- jquery untuk handle table -->
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>

        <!-- jquery validation engine -->
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/validationEngine/jquery.validationEngine.js'></script>
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
                            <span class="ico-layout-7"></span>
                        </div>
                        <h1>Proses<small> Penyerahan Dokumen</small></h1>
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
                                        PENJADWALAN
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 23));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/realisasi/penjadwalan">Penjadwalan</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        PENYERAHAN DOKUMEN
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 24));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li class="active"><a href="<?= base_url() ?>proses/realisasi/penyerahanDokumen">Penyerahan Dokumen</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        COVERNOTE
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 25));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/realisasi/covernote">Cover Note</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="span12">
                                            <div class="head dblue">
                                                <div class="icon"><span class="ico-layout-9"></span></div>
                                                <h2>Data Transaksi Pra-realisasi</h2>
                                                <ul class="buttons">
                                                    <li><a href="#" onClick="source('table_sort_pagination');
                                                            return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                                </ul>                                                        
                                            </div>                
                                            <div class="data-fluid">
                                                <div class="alert alert-success">            
                                                    <strong>Klik Pick!!</strong> Pada data transkasi yang ingin dokumennya divalidasi. . .
                                                </div>
                                                <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%">No. Pra-Realisasi</th>
                                                            <th width="30%">Nama</th>
                                                            <th width="35%">No. ID</th>
                                                            <th width="15%" class="TAC">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($dataTableTransaksipra as $row) { ?>       
                                                            <tr>
                                                                <td><a href="#"><?= $row->TRANSAKSIPRAID ?></a></td>
                                                                <td><?
                                                                    $customer = $this->model_core->get_where_result('customertrans', array('TRANSAKSIPRAID' => $row->TRANSAKSIPRAID));
                                                                    foreach ($customer as $row2) {
                                                                        ECHO $this->model_translate->dynamicTranslate('customer', 'CUSTOMERID', $row2->CUSTOMERID, 'NAMACUST') . '<br> ';
                                                                    }
                                                                    ?></td>
                                                                <td><?
                                                                    $customer = $this->model_core->get_where_result('customertrans', array('TRANSAKSIPRAID' => $row->TRANSAKSIPRAID));
                                                                    foreach ($customer as $row2) {
                                                                        ECHO $this->model_translate->dynamicTranslate('customer', 'CUSTOMERID', $row2->CUSTOMERID, 'NOIDPERSONALCUST') . '<br> ';
                                                                    }
                                                                    ?></td>
                                                                <td>
                                                                    <a href="<?= base_url(); ?>proses/realisasi/penyerahanDokumen/proses/<?= $row->TRANSAKSIPRAID ?>" class="button yellow tip jDialog_form_button" data-original-title="Proses">
                                                                        <div class="icon"><span class="ico-hand-up"></span></div>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>                                                            
                                                    </tbody>
                                                </table>                    
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
</html>