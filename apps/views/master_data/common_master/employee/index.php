<?php
/*
 * Project Name: notary
 * File Name: employee
 * File Directory: Expression filedir is undefined on line 5, column 22 in Templates/Scripting/EmptyPHP.php.
 * Created on: 07 Jan 14 - 13:21:49
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
                        <div align="center"><strong>[Pemberitahuan]</strong> Data employee berhasil disimpan!</div>
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
                                        <li><a href="#" onClick="source('tabs');
                                                return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
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
                                            <li class="active"><a href="<?= base_url() ?>master_data/common_master/employee/index">Data</a></li>
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
                                            <li><a href="<?= base_url() ?>master_data/common_master/employee/entry">Entry</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="block">
                                            <?php
                                            $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 35));

                                            $menuid1 = $qry['allow'];

                                            if ($menuid1 == 1) {
                                                ?>
                                                <H3>Anda tidak punya hak akses untuk tab Data Employee</H3>
                                                <H4>Silahkan pilih tab menu lain yang tersedia diatas</H4>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="head dblue">
                                                    <div class="icon"><span class="ico-layout-9"></span></div>
                                                    <h2>Employee Master Data</h2>
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
                                                                <th width="15%">NIP</th>
                                                                <th width="30%">Nama</th>
                                                                <th width="15%">Jabatan</th>
                                                                <th width="20%">NO.ID</th>
                                                                <th width="20%">Action</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($list as $row):
                                                                ?>
                                                                <tr>
                                                                    <td><input type="checkbox" name="order[]" value="528"/></td>
                                                                    <td><?= $row->NIP ?></a></td>
                                                                    <td><?= $row->NAMALENGKAP ?></td>
                                                                    <td><?= $this->model_translate->jabatan($row->JABATANID) ?></td>
                                                                    <td><?= $row->NOIDENTITASPERSONAL ?></td>
                                                                    <td>
                                                                        <a href="<?= base_url() ?>master_data/common_master/employee/detail/<?= $row->EMPLOYEEID ?>" class="button purple tip" data-original-title="Detail">
                                                                            <div class="icon"><span class="icon-list icon-white"></span></div>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            endforeach;
                                                            ?>
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
</html>
