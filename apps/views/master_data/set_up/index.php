<?php
/*
 * Project Name: notary
 * File Name: set_up
 * Created on: 07 Jan 14 - 9:38:11
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
                        <h1>Set-up <small>Silahkan pilih menu yang ingin anda akses</small></h1>
                    </div>
                    <!-- menu widget start here -->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widgets">
                                <!-----------------------------------------------------------
                                User-defined Alert
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 49));

                                $menuid1 = $qry['allow'];

                                if ($menuid1 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-cone"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/set_up/user_defined_alert">User-defined Alert</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <!-----------------------------------------------------------
                                Set Default
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 50));

                                $menuid1 = $qry['allow'];

                                if ($menuid1 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-check"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/set_up/set_default/proses">Set Default</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <!-----------------------------------------------------------
                                Approval/Escalation
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 51));

                                $menuid1 = $qry['allow'];

                                if ($menuid1 != 1) {
                                    ?>
<!--                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-warning-sign"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<? //base_url() ?>master_data/set_up/approval_atau_escalation">Approval/Escalation</a>
                                        </div>
                                    </div>-->
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
        <div class="dialog" id="source" style="display: none;" title="Source"></div>
    </body>
</html>