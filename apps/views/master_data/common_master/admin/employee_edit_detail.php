<?php
/*
 * Project Name: notary
 * File Name: employee_edit_detail
 * Created on: 20 Jan 14 - 14:57:40
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
                                        <li><a href="#" onClick="source('tabs'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
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
                                                <h2>Edit Detail Data Employee</h2>                              
                                            </div>                                               
                                            <form id="validate" method="POST" action="<?= base_url() ?>control/edit/employee_detail">
                                                <div class="data-fluid">
                                                    <div class="row-form">
                                                        <div class="span2"></div>
                                                        <div class="span3">
                                                            <input type="hidden" name="EMPLOYEEID" value="<?= $this->uri->segment(6)?>">
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Gedung:</div>
                                                        <div class="span3">
                                                            <input type="text" name="GEDUNG" value="<?= $detail['GEDUNG'] ?>"/>
                                                        </div>
                                                        <div class="span2">Lantai:</div>
                                                        <div class="span3">
                                                            <input type="text" name="LANTAIGEDUNG" value="<?= $detail['LANTAIGEDUNG'] ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Jalan:</div>
                                                        <div class="span10">
                                                            <input type="text" name="JALAN" class="validate[required]" value="<?= $detail['JALAN'] ?>"/>
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Kelurahan/Desa:</div>
                                                        <div class="span3">
                                                            <input type="text" name="KELURAHANDESA" value="<?= $detail['KELURAHANDESA'] ?>"/>
                                                        </div>
                                                        <div class="span2">RT:</div>
                                                        <div class="span3">
                                                            <input type="text" name="RT" value="<?= $detail['RT'] ?>"/>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Kecamatan:</div>
                                                        <div class="span3">
                                                            <input type="text" name="KECAMATAN" value="<?= $detail['KECAMATAN'] ?>"/>
                                                        </div>
                                                        <div class="span2">RW:</div>
                                                        <div class="span3">
                                                            <input type="text" name="RW" value="<?= $detail['RW'] ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Kab/Kota:</div>
                                                        <div class="span3">
                                                            <input type="text" name="DATI1" class="validate[required]" value="<?= $detail['DATI1'] ?>"/>
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                        <div class="span2">Kode POS:</div>
                                                        <div class="span3">
                                                            <input type="text" name="KODEPOS" value="<?= $detail['KODEPOS'] ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Provinsi:</div>
                                                        <div class="span3">
                                                            <input type="text" name="DATI2" class="validate[required]" value="<?= $detail['DATI2'] ?>"/>
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                        <div class="span2">Negara:</div>
                                                        <div class="span3">
                                                            <input type="text" name="NEGARA" class="validate[required]" value="<?= $detail['NEGARA'] ?>"/>
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">No. TLP:</div>
                                                        <div class="span3">
                                                            <input type="text" name="NOTELP" value="<?= $detail['NOTELP'] ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2"></div>
                                                        <div class="span3">
                                                        </div>
                                                        <div class="span2">No. HP:</div>
                                                        <div class="span3">
                                                            <input type="text" name="NOHP" value="<?= $detail['NOHP'] ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2"></div>
                                                        <div class="span3">
                                                        </div>
                                                        <div class="span2">Email:</div>
                                                        <div class="span3">
                                                            <input type="text" name="EMAIL" value="<?= $detail['EMAIL'] ?>"/>
                                                        </div>
                                                    </div>      

                                                    <div class="toolbar bottom">
                                                        <div class="btn-group">
                                                            <button class="btn btn-info" type="button" onClick="$('#validate').validationEngine('hide');">Hide prompts</button>
                                                            <button class="btn" type="submit">Simpan</button>
                                                            <button class="btn btn-info" type="reset">Reset</button>
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
