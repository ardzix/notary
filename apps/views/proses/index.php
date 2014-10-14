<?php
/*
 * @author        : Pt. Qiwary Usaha Nusantara
 * File Name      : index.php;
 * Encoding       : UTF-8;
 * File Created @ : 26 Mar 14, 10:31:28;
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
                                PRA-REALISASI
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 3));

                                $menuid3 = $qry['allow'];

                                if ($menuid3 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-resize-2"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>proses/pra_realisasi/entry">Pra Realisasi</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <!-----------------------------------------------------------
                                REALISASI
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 4));

                                $menuid4 = $qry['allow'];

                                if ($menuid4 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-refresh"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>proses/realisasi/penjadwalan">Realisasi</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <!-----------------------------------------------------------
                                PASCA-REALISASI
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 5));

                                $menuid5 = $qry['allow'];

                                if ($menuid5 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-expand"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>proses/pasca_realisasi">Pasca-Realisasi</a>
                                        </div>
                                    </div>     
                                    <?php
                                }
                                ?>
                                <!-----------------------------------------------------------
                                PEMBAYARAN
                                ------------------------------------------------------------>
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 6));

                                $menuid6 = $qry['allow'];

                                if ($menuid6 != 1) {
                                    ?>
                                    <div class="widget blue icon">
                                        <div class="left">
                                            <div class="icon">
                                                <span class="ico-money"></span>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <a href="<?= base_url() ?>proses/pembayaran/lihat">Pembayaran</a>
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


