<?php
/*
 * Project Name: notary
 * File Name: employee_edit_foto
 * Created on: 20 Jan 14 - 14:58:26
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <!-- header start here -->
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
                        <h1>Employee <small> Master Data</small></h1>
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
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 19));

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
                                            <li class="active"><a href="<?= base_url() ?>master_data/common_master/admin/employee">Data Employee</a></li>
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
                                    <div class="span12">                

                                        <div class="block">
                                            <div class="head">
                                                <div id="nyekrol"></div>
                                                <h2>Edit Data Employee</h2>                              
                                            </div>                                               
                                            <form method="POST" action="<?= base_url() ?>control/edit/employee_detail_foto" enctype="multipart/form-data">
                                                <div class="data-fluid">
                                                    <div class="row-form">
                                                        <div class="span2"></div>
                                                        <div class="span3">
                                                            <input type="hidden" name="EMPLOYEEID" value="<?= $this->uri->segment(6) ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Curent Photo:</div>
                                                        <div class="span5">
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
                                                    <div class="row-form">
                                                        <div class="span2">Upload New Photo:</div>
                                                        <div class="span5">
                                                            <input type="file" name="photo"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Aktifasi Photo:</div>
                                                        <div class="span5">
                                                            <input type="radio" checked="checked" name="STATUSDISPLAYID" value="1"/>Aktif 
                                                            <input type="radio" name="STATUSDISPLAYID" value="2"/>Tidak Aktif
                                                        </div>
                                                    </div>
                                                    <div class="toolbar bottom">
                                                        <div class="btn-group">
                                                            <button type="submit" class="btn">Upload</button>
                                                        </div>
                                                    </div>
                                                </div>                
                                            </form>
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