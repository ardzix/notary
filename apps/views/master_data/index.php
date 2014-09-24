<?php
/*
 * @author        : Pt. Qiwary Usaha Nusantara
 * File Name      : index.php;
 * Encoding       : UTF-8;
 * File Created @ : 26 Mar 14, 10:20:47;
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
                        <h1>Master Data<small>Silahkan pilih menu yang ingin anda akses</small></h1>
                    </div>

                    <!-- menu widget start here -->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widgets">
                                <!-----------------------------------------------------------
                                COMMON MASTER
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 8));

                                $menuid8 = $qry['allow'];

                                if ($menuid8 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-add"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/common_master/">Common Master</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <!-----------------------------------------------------------
                                PROSES MASTER
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 9));

                                $menuid9 = $qry['allow'];

                                if ($menuid9 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-random"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/proses_master">Proses Master</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <!-----------------------------------------------------------
                                BANK MASTER
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 10));

                                $menuid10 = $qry['allow'];

                                if ($menuid10 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-money-bag"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/financial_master">BANK Master</a>
                                        </div>
                                    </div>     
                                    <?php
                                }
                                ?>
                                <!-----------------------------------------------------------
                                SETUP
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 11));

                                $menuid11 = $qry['allow'];

                                if ($menuid11 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-wrench"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/set_up">Setup</a>
                                        </div>
                                    </div>     
                                    <?php
                                }
                                ?>
                                <!-----------------------------------------------------------
                                FORM MASTER
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 12));

                                $menuid12 = $qry['allow'];

                                if ($menuid12 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-list"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>master_data/form_master/gender">Form Master</a>
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
