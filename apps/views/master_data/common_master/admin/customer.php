<?php
/*
 * Project Name: notary
 * File Name: customer
 * Created on: 16 Jan 14 - 3:56:21
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <!-- jquery untuk handle table -->
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>

        <!-- jquery validation engine -->
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/validationEngine/jquery.validationEngine.js'></script>
        <script type='text/javascript'>
            function showDiv() {
                document.getElementById('tab2').style.visibility = "visible";
            }
        </script>

    </head>

    <body>    
        <div id="loader"><img src="<?= NOTARY_ASSETS ?>img/loader.gif"/></div>
        <div class="wrapper">

            <!-- sidebar menu start here -->
            <?= $this->load->view('slice/sidebar'); ?>

            <div class="body">
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'update') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Data customer berhasil diupdate!</div>
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
                        <h1>Admin <small> Master Data</small></h1>
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
                                <ul class="nav nav-tabs">
                                    <!-----------------------------------------------------------
                                    AKUN
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 37));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>master_data/common_master/admin/akun">Akun</a></li>
                                        <?php
                                    }
                                    ?>
                                    <!-----------------------------------------------------------
                                    OTORISASI
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 38));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>master_data/common_master/admin/otorisasi">Otorisasi</a></li>
                                        <?php
                                    }
                                    ?>    
                                    <!-----------------------------------------------------------
                                    DATA CUSTOMER
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 39));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li class="active"><a href="<?= base_url() ?>master_data/common_master/admin/customer">Data Customer</a></li>
                                        <?php
                                    }
                                    ?>
                                    <!-----------------------------------------------------------
                                    DATA EMPLOYEE
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 40));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>master_data/common_master/admin/employee">Data Employee</a></li>
                                        <?php
                                    }
                                    ?>   
                                    <!-----------------------------------------------------------
                                    KONFIGURASI MENU
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 41));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>master_data/common_master/admin/konfigurasi_menu">Konfigurasi Menu</a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>

                                <div class="head dblue">
                                    <div class="icon"><span class="ico-layout-9"></span></div>
                                    <h2>Customer Master Data</h2>
                                    <ul class="buttons">
                                        <li><a href="#" onClick="source('table_sort_pagination');
                                                return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>                                                        
                                </div>                
                                <div class="data-fluid">
                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="checkall"/></th>
                                                <th width="15%">NO.Customer</th>
                                                <th width="15%">NO. ID</th>
                                                <th width="20%">Nama</th>
                                                <th width="30%">Tipe Customer</th>
                                                <th width="20%" class="TAC">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($customer as $row):
                                                ?>
                                                <tr>
                                                    <td><input type="checkbox" name="order[]" value="528"/></td>
                                                    <td><?= $row->CUSTOMERID ?></td>
                                                    <td><?= $row->NOIDPERSONALCUST ?></td>
                                                    <td><?= $row->NAMACUST ?></td>
                                                    <td><?= $this->model_translate->tipecustomer($row->TIPECUSTID) ?></td>
                                                    <td>
                                                        <a href="#dModal" role="button" class="button green tip" data-original-title="Edit" data-toggle="modal" onClick="modalToogler('<?= $row->CUSTOMERID ?>')" ><div class="icon"><span class="ico-pencil"></span></div></a>
                                                        <a href="#bModal" role="button" class="button red tip" data-original-title="Delete" data-toggle="modal" onClick="modalToogler('<?= $row->CUSTOMERID ?>')" >
                                                            <div class="icon"><span class="ico-remove"></span></div>
                                                        </a>
                                                        <a href="<?= base_url() ?>master_data/common_master/admin/customer/detail/<?= $row->CUSTOMERID ?>" class="button purple tip" data-original-title="Detail">
                                                            <div class="icon"><span class="icon-list icon-white"></span></div>
                                                        </a>
                                                    </td>
                                                    <?php
                                                endforeach;
                                                ?>                   
                                        </tbody>
                                    </table> 
                                </div>
                            </div> 
                        </div>
                        <!-- Delete modal -->
                        <div id="bModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Apakah anda yakin ingin menghapus data ini?</h3>
                            </div>
                            <div class="modal-body">
                                <p>Peringatan! Data yang telah terhapus tidak akan bisa dikembalikan lagi.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="" id="delete">
                                    <button class="btn btn-warning" aria-hidden="true">Delete</button>
                                </a> 
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>            
                            </div>
                        </div>
                        <!-- Edit modal -->
                        <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Pilih Data yang akan Di Edit</h3>
                            </div>
                            <div class="modal-body">
                                <div class="widgets">
                                    <a id="edit" href="" class="swidget blue">
                                        <div class="icon">
                                            <span class="ico-tag"></span>
                                        </div>
                                        <div class="bottom">
                                            <div class="text">Basic Data</div>
                                        </div>                                
                                    </a>
                                    <a id="edit_detail" href="" class="swidget blue">
                                        <div class="icon">
                                            <span class="ico-tags"></span>
                                        </div>
                                        <div class="bottom">
                                            <div class="text">Detail Data</div>
                                        </div>                                
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END of Edit modal -->
                        <?= $this->load->view('slice/tambal'); ?>
                    </div>                
                </div>
            </div>
        </div>
    </body>
</html>
<script language="javascript">
    
    function modalToogler(customerId)
    {
        document.getElementById('edit').href = '<?= base_url() ?>master_data/common_master/admin/customer/edit/'+customerId;
        document.getElementById('edit_detail').href = '<?= base_url() ?>master_data/common_master/admin/customer/edit_detail/'+customerId;
        document.getElementById('delete').href = '<?= base_url() ?>control/delete/customer/'+customerId;
        
    }
</script>