<?php
/*
 * Project Name: notary
 * File Name: customer_edit
 * Created on: 20 Jan 14 - 14:54:51
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
                        <h1>Customer <small> Master Data</small></h1>
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
                                    <div class="span12">                

                                        <div class="block">
                                            <div class="head">
                                                <h2>Edit Data Customer</h2>                              
                                            </div>                                               
                                            <form id="validate" method="POST" action="<?= base_url() ?>control/edit/customer">
                                                <input type="hidden" name="CUSTOMERID" value="<?= $this->uri->segment(6) ?>">
                                                <div class="data-fluid">

                                                    <div class="row-form">

                                                        <div class="span2">Tipe Customer:</div>
                                                        <div class="span3">                            
                                                            <select class="select" name="TIPECUSTID" style="width: 100%;">
                                                                <option value="<?= $customer['TIPECUSTID']?>"><?= $this->model_translate->dynamicTranslate('tipecustomer','TIPECUSTID',$customer['TIPECUSTID'],'TIPECUSTDESC')?></option>
                                                                <?php
                                                                foreach ($tipecustomer as $row):
                                                                    ?>
                                                                    <option value="<?= $row->TIPECUSTID ?>"><?= $row->TIPECUSTDESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>                                                                 
                                                            </select>                            
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Tipe ID:</div>
                                                        <div class="span3">                            
                                                            <select class="select" name="IDENTITASPERSONALID" style="width: 100%;">
                                                                <option value="<?= $customer['IDENTITASPERSONALID']?>"><?= $this->model_translate->dynamicTranslate('identitaspersonal','IDENTITASPERSONALID',$customer['IDENTITASPERSONALID'],'IDENTITASPERSONALDESC')?></option>
                                                                <?PHP foreach ($identitaspersonal as $row):
                                                                    ?>
                                                                    <option value="<?= $row->IDENTITASPERSONALID ?>"><?= $row->IDENTITASPERSONALDESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>                    
                                                            </select>                            
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                        <div class="span2">No. ID:</div>
                                                        <div class="span3">
                                                            <input type="text" NAME="NOIDPERSONALCUST" value="<?= $customer['NOIDPERSONALCUST'] ?>"/>
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Nama:</div>
                                                        <div class="span3">
                                                            <input type="text"  name="NAMACUST" value="<?= $customer['NAMACUST']?>"/>
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                        <div class="span2">Gender:</div>
                                                        <div class="span3">                            
                                                            <select class="select" name="GENDER" style="width: 100%;">
                                                                <option value="<?= $customer['GENDER']?>"><?= $this->model_translate->dynamicTranslate('gender','GENDER',$customer['GENDER'],'GENDERDESC')?></option>
                                                                <?PHP foreach ($gender as $row):
                                                                    ?>
                                                                    <option value="<?= $row->GENDER ?>"><?= $row->GENDERDESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>

                                                            </select>                            
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Tanggal Lahir:</div>
                                                        <div class="span3">
                                                            <input type="text" name="TANGGALLAHIRCUST" value="<?php
                                                        if ($customer['TANGGALLAHIRCUST'] != 0000 - 00 - 00) {
                                                            echo date('d-m-Y', strtotime($customer['TANGGALLAHIRCUST']));
                                                        } else {
                                                            echo "-";
                                                        }
                                                        ?>"/>
                                                            <span class="bottom"><?php  echo date('d-m-Y', strtotime($customer['TANGGALLAHIRCUST'])); ?>Wajib diisi, format: YYYY-MM-DD</span>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Pekerjaan:</div>
                                                        <div class="span3">                            
                                                            <select class="select" name="PEKERJAANID" style="width: 100%;">
                                                                <option value="<?= $customer['PEKERJAANID']?>"><?= $this->model_translate->dynamicTranslate('pekerjaan','PEKERJAANID',$customer['PEKERJAANID'],'PEKERJAANDESC')?></option>
                                                                <?PHP foreach ($pekerjaan as $row):
                                                                    ?>
                                                                    <option value="<?= $row->PEKERJAANID ?>"><?= $row->PEKERJAANDESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>

                                                            </select>                            
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="toolbar bottom">
                                                        <div class="btn-group">
                                                            <button class="btn btn-info" type="button" onClick="$('#validate').validationEngine('hide');">Hide prompts</button>
                                                            <button class="btn" type="submit">Update</button>
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