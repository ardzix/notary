<?php
/*
 * Project Name: notary
 * File Name: entry_detail_foto
 * Created on: 16 Jan 14 - 10:34:18
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
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'success') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Detail data detail employee berhasil disimpan!</div>
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
                                        Data
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 35));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>master_data/common_master/employee/index">Data</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Entry
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 36));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li class="active"><a href="<?= base_url() ?>master_data/common_master/employee/entry">Entry</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <div class="span12">                

                                        <div class="block">
                                            <div class="head">
                                                <div id="nyekrol"></div>
                                                <h2>Entry Data Employee</h2>                              
                                            </div>                                               
                                            <form method="POST" action="<?= base_url() ?>control/add/employee_detail_foto" enctype="multipart/form-data">
                                                <div class="data-fluid">
                                                        <div class="row-form">
                                                            <div class="span2"></div>
                                                            <div class="span3">
                                                                <input type="hidden" name="EMPLOYEEID" value="<?= $this->uri->segment(5)?>">
                                                            </div>
                                                        </div>
                                                    <div class="row-form">
                                                        <div class="span2">Upload Photo:</div>
                                                        <div class="span5">
                                                                <input type="file" name="photo"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Aktifasi Photo:</div>
                                                        <div class="span5">
                                                            <?php foreach ($statusdisplay as $row):
                                                                ?>
                                                            <input type="radio" name="STATUSDISPLAYID" value="<?= $row->STATUSDISPLAYID ?>"/><?= $row->STATUSDISPLAYDESC ?>
                                                            <?php
                                                            endforeach;
                                                            ?>
                                                             
                                                            
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