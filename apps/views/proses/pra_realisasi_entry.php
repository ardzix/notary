<?php
/*
 * Project Name: notary
 * File Name: pra_realisasi
 * Created on: 09 Jan 14 - 9:25:13
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
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'success') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Data Pra Realisasi berhasil disimpan!</div>
                    </div>
                    <?php
                }
                ?>
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
                                            <li class="active"><a href="<?= base_url() ?>proses/pra_realisasi/entry">Daftar Transaksi Customer</a></li>
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
                                        Input Data
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 56));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/input_data">Input Data</a></li>
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
                                            <?php
                                            $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 17));

                                            $menuid1 = $qry['allow'];

                                            if ($menuid1 == 1) {
                                                ?>
                                                <H3>Silahkan pilih tab menu yang tersedia diatas</H3>
                                                <?php
                                            } else {
                                                ?>

                                                <div class="head dblue">
                                                    <div class="icon"><span class="ico-layout-9"></span></div>
                                                    <h2>Data Customer</h2>
                                                    <ul class="buttons">
                                                        <li><a href="#" onClick="source('table_sort_pagination');
                                                                return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                                    </ul>                                                        
                                                </div>                
                                                <div class="data-fluid">
                                                    <div class="alert alert-success">            
                                                        <strong>Klik Pick!!</strong> Pada data customer yang ingin anda proses. . .
                                                    </div>
                                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th width="5%"><input type="checkbox" class="checkall"/></th>
                                                                <th width="20%">No. Customer</th>
                                                                <th width="35%">Nama</th>
                                                                <th width="25%">No. ID</th>
                                                                <th width="15%" class="TAC">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                            <?php foreach ($dataTableCustomer as $row) { ?>       
                                                                <tr>
                                                                    <td><input type="checkbox" name="order[]" value="528"/></td>
                                                                    <td><a href="#"><?= $row->CUSTOMERID ?></a></td>
                                                                    <td><?= $row->NAMACUST ?></td>
                                                                    <td><?= $row->NOIDPERSONALCUST ?></td>
                                                                    <td>
                                                                        <a href="#dModal" role="button"  class="button purple tip"  data-toggle="modal" data-original-title="Detail" onClick="modalToogler('<?= $row->CUSTOMERID ?>')">
                                                                            <div class="icon"><span class="icon-list icon-white"></span></div>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>                                                            
                                                        </tbody>
                                                    </table>                    
                                                </div> 
                                                <?php
                                            }
                                            ?>
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
            url: "<?= base_url() ?>proses/pra_realisasi/entry/myModalBody",
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
            url: "<?= base_url() ?>proses/pra_realisasi/entry/myModalLabel",
            data: data,
            success: function(msg) {
                $('#myModalLabels').html(msg);
            }
        });
    }
</script>
