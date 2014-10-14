<?php
/*
 * Project Name: notary
 * File Name: proses_master
 * Created on: 07 Jan 14 - 9:37:29
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
                        <h1>Proses Master <small>Silahkan pilih menu yang ingin anda akses</small></h1>
                    </div>
                    <!-- menu widget start here -->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widgets">
                                <!-----------------------------------------------------------
                                SET-UP PROSES
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 42));

                                $menuid1 = $qry['allow'];

                                if ($menuid1 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-cogs-2"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/proses_master/setup_proses">Set-up Proses</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <!-----------------------------------------------------------
                                SET-UP TIMELINE
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 43));

                                $menuid1 = $qry['allow'];

                                if ($menuid1 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-tasks"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/proses_master/setup_timeline">Set-up Timeline</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <!-----------------------------------------------------------
                                SET-UP AKTA
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 44));

                                $menuid1 = $qry['allow'];

                                if ($menuid1 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-address-book"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/proses_master/setup_akta">Set-up Akta</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <!-----------------------------------------------------------
                                TIPE SERTIFIKAT
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 55));

                                $menuid1 = $qry['allow'];

                                if ($menuid1 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-briefcase"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/proses_master/kantor_proses">Kantor Proses</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                
                                <!-----------------------------------------------------------
                                KANTOR PROSES
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 45));

                                $menuid1 = $qry['allow'];

                                if ($menuid1 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-copy"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/proses_master/tipe_sertifikat">Tipe Sertifikat</a>
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
        <div class="dialog" id="source" style="display: none;" title="Source"></div>
    </body>
</html>