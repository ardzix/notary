<?php
/*
 * Project Name: notary
 * File Name: index
 * Created on: 16 Jan 14 - 3:48:43
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
                        <div align="center"><strong>[Pemberitahuan]</strong> Data akun berhasil disimpan!</div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'update') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Data akun berhasil diupdate!</div>
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
                                        <li class="active"><a href="<?= base_url() ?>master_data/common_master/admin/akun">Akun</a></li>
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
                                        <li><a href="<?= base_url() ?>master_data/common_master/admin/customer">Data Customer</a></li>
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
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 37));

                                $menuid1 = $qry['allow'];

                                if ($menuid1 == 1) {
                                    ?>
                                    <H3>Anda tidak punya hak akses untuk tab akun</H3>
                                    <H4>Silahkan pilih tab menu lain yang tersedia diatas</H4>
                                    <?php
                                } else {
                                    ?>
                                    <div class="head dblue">
                                        <a href="<?= base_url() ?>master_data/common_master/admin/akun/add" role="button" data-original-title="Add">
                                            <span class="label label-success">Buat Akun</span>
                                        </a>                                                      
                                    </div>                
                                    <div class="data-fluid">
                                        <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" class="checkall"/></th>
                                                    <th width="20%">Username</th>
                                                    <th width="30%">Employee</th>
                                                    <th width="30%">Status User</th>
                                                    <th width="20%" class="TAC">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($user as $row):
                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="order[]" value="528"/></td>
                                                        <td><?= $row->USERNAME ?></td>
                                                        <td>
                                                            <?php
                                                            if ($row->EMPLOYEEID == '') {
                                                                echo "-";
                                                            } else {
                                                                echo $this->model_translate->employee($row->EMPLOYEEID);
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row->STATUSUSERID == '') {
                                                                echo "-";
                                                            } else {
                                                                echo $this->model_translate->statususer($row->STATUSUSERID);
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <!--                                                                <button class="btn tip" data-original-title="Default tip">Default tip</button>-->

                                                            <a href="<?= base_url() ?>master_data/common_master/admin/akun/edit/<?= $row->USERID ?>" class="button green tip" data-original-title="Edit">
                                                                <div class="icon"><span class="ico-pencil"></span></div>
                                                            </a>
                                                            <?php
                                                            if ($this->session->userdata('OTORITASID') == 3) {
                                                                ?>
                                                                <a href="<?= base_url() ?>master_data/common_master/admin/akun/edit_admin" class="button yellow tip" data-original-title="Edit Admin">
                                                                    <div class="icon"><span class="ico-pencil"></span></div>
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>
                                                            <a href="#bModal" role="button" class="button red tip" data-original-title="Delete" data-toggle="modal" onClick="modalToogler('<?= $row->USERID ?>')">
                                                                <div class="icon"><span class="ico-remove"></span></div>
                                                            </a>

                                                            <a href="<?= base_url() ?>master_data/common_master/admin/akun/detail/<?= $row->USERID ?>" class="button purple tip" data-original-title="Detail">
                                                                <div class="icon"><span class="icon-list icon-white"></span></div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                endforeach;
                                                ?>                     
                                            </tbody>
                                        </table>
                                        <?php
                                    }
                                    ?>
                                </div> 
                            </div> 
                        </div>
                        <?= $this->load->view('slice/tambal'); ?>
                    </div>                
                </div>
            </div>
        </div>

        <!-- Bootrstrap modal -->
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
    </body>
</html>
<script language="javascript">

    function modalToogler(userId)
    {
        document.getElementById('delete').href = '<?= base_url() ?>control/delete/akun/' + userId;

    }
</script>
