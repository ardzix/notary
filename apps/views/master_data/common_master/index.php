<?php
/*
 * Project Name: notary
 * File Name: common_master
 * Created on: 07 Jan 14 - 8:40:47
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <!-- header tag start here -->
    <head>
        <?= $this->load->view('slice/header-content'); ?>
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
                            <span class="ico-arrow-right"></span>
                        </div>
                        <h1>Common Master <small>Silahkan pilih menu yang ingin anda akses</small></h1>
                    </div>

                    <!-- menu widget start here -->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widgets">
                                <!-----------------------------------------------------------
                                CUSTOMER
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 30));

                                $menuid1 = $qry['allow'];

                                if ($menuid1 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-user"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/common_master/customer">Customer</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <!-----------------------------------------------------------
                                EMPLOYEE
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 31));

                                $menuid1 = $qry['allow'];

                                if ($menuid1 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-user"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/common_master/employee">Employee</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <!-----------------------------------------------------------
                                ADMIN
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 32));

                                $menuid1 = $qry['allow'];

                                if ($menuid1 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-user"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/common_master/admin/akun">Admin</a>
                                        </div>
                                    </div>     
                                    <?php
                                }
                                ?>               
                            </div>
                        </div>
                        <?= $this->load->view('slice/tambal'); ?>
                    </div>
                </div>

                <!-- content ends here -->
            </div>
        </div>
    </body>
</html>
