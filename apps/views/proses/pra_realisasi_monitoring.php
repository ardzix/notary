<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/input_all/transaksi">Input semua</a></li>
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
                                           <li class="active"><a href="<?= base_url() ?>proses/pra_realisasi/monitoring_dokumen">Monitoring Dokumen</a></li>
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
                                                                    <a href="<?= base_url(); ?>proses/pra_realisasi/monitoring_dokumen/proses/<?= $row->TRANSAKSIPRAID ?>" class="button purple tip jDialog_form_button" data-original-title="Pick">
                                                                        <div class="icon"><span class="icon-list icon-white"></span></div>
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

    <div id="fModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Modal form</h3>
        </div>        
        <div class="row-fluid">
            <div class="block-fluid">
                <div class="row-form">
                    <div class="span12">
                        <span class="top title">First name:</span>
                        <input type="text" name="fname" value=""/>                        
                    </div>
                </div>
                <div class="row-form">
                    <div class="span12">
                        <span class="top title">Last name:</span>
                        <input type="text" name="lname" value=""/>
                    </div>
                </div>
                <div class="row-form">
                    <div class="span12">
                        <span class="top title">Last name:</span>
                        <input type="text" name="lname" value=""/>
                    </div>
                </div>                
                <div class="row-form">
                    <div class="span12">
                        <span class="top title">About:</span>
                        <textarea></textarea>
                    </div>
                </div>       
            </div>
        </div>                   
        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Save updates</button> 
            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>            
        </div>
    </div>
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabels">Defaults</h3>
        </div>
        <div class="modal-body" id="myModalBody">
            <p align="center">
                <img src="<?= NOTARY_ASSETS ?>img/loaders/2d_1.gif"/> </p>
        </div>
    </div>
</html>

<script language="javascript">

    function modalToogler(custId)
    {
        myModalLabelGenerator(custId);
        myModalBodyGenerator(custId);
    }

    function myModalBodyGenerator(custId)
    {
        var data = {custId: custId};
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>proses/pra_realisasi/myModalBody",
            data: data,
            success: function(msg) {
                $('#myModalBody').html(msg);
            }
        });
    }
    function myModalLabelGenerator(custId)
    {
        var data = {custId: custId};
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>proses/pra_realisasi/myModalLabel",
            data: data,
            success: function(msg) {
                $('#myModalLabels').html(msg);
            }
        });
    }
</script>

