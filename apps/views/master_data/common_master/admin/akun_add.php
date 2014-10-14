<?php
/*
 * Project Name: notary
 * File Name: admin_add
 * File Directory: Expression filedir is undefined on line 5, column 22 in Templates/Scripting/EmptyPHP.php.
 * Created on: 07 Jan 14 - 14:01:00
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
                if (isset($_GET['message']) && $_GET['message'] == 'error') {
                    ?>
                    <div class="alert alert-error">            
                        <div align="center"><strong>[ERROR]</strong> Pastikan anda memasukan password dengan benar!</div>
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
                            <span class="ico-plus-sign"></span>
                        </div>
                        <h1>ADD<small> Akun</small></h1>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="block">
                                <div class="head">
                                    <ul class="buttons">
                                        <li><a href="#" onClick="source('tabs'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
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

                                <div class="row-fluid">

                                    <div class="span6">                

                                        <div class="block">
                                            <div class="head">                                
                                                <h2>Add Akun</h2>                                
                                            </div>                                        
                                            <div class="data-fluid">
                                                <FORM ACTION="<?= base_url() ?>control/add/akun" METHOD="POST">
                                                    <div class="row-form">
                                                        <div class="span4">Employee:</div>
                                                        <div class="span8">
                                                            <select class="select" name="EMPLOYEEID" class="validate[required]" style="width: 100%;">
                                                                <option value=""></option>
                                                                <?PHP FOREACH ($employee as $row):
                                                                    ?>
                                                                    <option value="<?= $row->EMPLOYEEID ?>"><?= $row->NAMALENGKAP ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>                                                       
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Status User:</div>
                                                        <div class="span8">
                                                            <select class="select" name="STATUSUSERID" class="validate[required]" style="width: 100%;">
                                                                <option value=""></option>
                                                                <?PHP foreach ($statususer as $row):
                                                                    ?>
                                                                    <option value="<?= $row->STATUSUSERID ?>"><?= $row->STATUSUSERDESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Otoritas:</div>
                                                        <div class="span8">
                                                            <select class="select" name="OTORITASID" class="validate[required]" style="width: 100%;">
                                                                <option value=""></option>
                                                                <?PHP foreach ($otoritas as $row):
                                                                    ?>
                                                                    <option value="<?= $row->OTORITASID ?>"><?= $row->OTORITASDESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4"></div>
                                                        <div class="span8"><input type="hidden" name="PEMBUATUSER"/></div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Username:</div>
                                                        <div class="span8"><input type="text" NAME="USERNAME" placeholder="Masukan nama akun"/></div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Password:</div>
                                                        <div class="span8"><input type="password" NAME="PASSWORD"/></div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Konfirmasi Password:</div>
                                                        <div class="span8"><input type="password" NAME="KONFIRMASIPASSWORD"/></div>
                                                    </div>
                                                    <div class="toolbar bottom tar">
                                                        <div class="btn-group">
                                                            <button class="btn" type="submit">Simpan</button>
                                                        </div>
                                                    </div>
                                                </FORM>
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
