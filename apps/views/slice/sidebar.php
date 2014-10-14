<?php
/*
 * Project Name: notary
 * File Name: sidebar
 * Created on: 07 Jan 14 - 8:06:54
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<div class="sidebar">

    <div class="top">
        <a href="<?= base_url() ?>notifikasi" class="logo"></a>
    </div>
<!--    <div class="nContainer">                
        <ul class="navigation">
            <?php
            $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 1));

            $menuid1 = $qry['allow'];

            if ($menuid1 != 1) {
                ?>
                <li class="active"><a href="<?= base_url() ?>notifikasi" class="blblue">Notifikasi</a></li>
                <?php
            }
            ?>

            <?php
            $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 2));

            $menuid2 = $qry['allow'];

            if ($menuid2 != 1) {
                ?>
                <li>
                    <a href="proses" class="blyellow">Proses</a>
                    <div class="open"></div>
                    <ul>
                        <?php
                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 3));

                        $menuid3 = $qry['allow'];

                        if ($menuid3 != 1) {
                            ?>
                            <li><a href="<?= base_url() ?>proses/pra_realisasi/entry">Pra-realisasi</a></li>
                            <?php
                        }
                        ?>
                        <?php
                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 4));

                        $menuid4 = $qry['allow'];

                        if ($menuid4 != 1) {
                            ?>
                            <li><a href="<?= base_url() ?>proses/realisasi/penjadwalan">Realisasi</a></li>
                            <?php
                        }
                        ?>
                        <?php
                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 5));

                        $menuid5 = $qry['allow'];

                        if ($menuid5 != 1) {
                            ?>
                            <li><a href="<?= base_url() ?>proses/pasca_realisasi">Pasca-realisasi</a></li>
                            <?php
                        }
                        ?>
                        <?php
                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 6));

                        $menuid6 = $qry['allow'];

                        if ($menuid6 != 1) {
                            ?>
                            <li><a href="<?= base_url() ?>proses/pembayaran">Pembayaran</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <?php
            }
            ?>

            <?php
            $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 7));

            $menuid7 = $qry['allow'];

            if ($menuid7 != 1) {
                ?>
                <li>
                    <a href="#" class="blgreen">Master Data</a>
                    <div class="open"></div>
                    <ul>
                        <?php
                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 8));

                        $menuid8 = $qry['allow'];

                        if ($menuid8 != 1) {
                            ?>
                            <li><a href="<?= base_url() ?>master_data/common_master/">Common Master</a></li>
                            <?php
                        }
                        ?>
                        <?php
                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 9));

                        $menuid9 = $qry['allow'];

                        if ($menuid9 != 1) {
                            ?>
                            <li><a href="<?= base_url() ?>master_data/proses_master">Proses Master</a></li>
                            <?php
                        }
                        ?>
                        <?php
                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 10));

                        $menuid10 = $qry['allow'];

                        if ($menuid10 != 1) {
                            ?>
                            <li><a href="<?= base_url() ?>master_data/financial_master">Financial Master</a></li>
                            <?php
                        }
                        ?>
                        <?php
                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 11));

                        $menuid11 = $qry['allow'];

                        if ($menuid11 != 1) {
                            ?>
                            <li><a href="<?= base_url() ?>master_data/set_up">Set-up</a></li>
                            <?php
                        }
                        ?>
                        <?php
                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 12));

                        $menuid12 = $qry['allow'];

                        if ($menuid12 != 1) {
                            ?>
                            <li><a href="<?= base_url() ?>master_data/form_master/gender">Form Master</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <?php
            }
            ?>
            <?php
            $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 13));

            $menuid13 = $qry['allow'];

            if ($menuid13 != 1) {
                ?>
                <li><a href="<?= base_url() ?>kinerja" class="blpurple">Kinerja</a></li>
                <?php
            }
            ?>
            <?php
            $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 14));

            $menuid14 = $qry['allow'];

            if ($menuid14 != 1) {
                ?>
                <li><a href="<?= base_url() ?>laporan" class="blred">Laporan</a></li>
                <?php
            }
            ?>
            <?php
            $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 15));

            $menuid15 = $qry['allow'];

            if ($menuid15 != 1) {
                ?>
                <li><a href="<?= base_url() ?>chating" class="blbirutua">Chat</a></li>
                <?php
            }
            ?>
            <?php
            $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 16));

            $menuid16 = $qry['allow'];

            if ($menuid16 != 1) {
                ?>
                <li><a href="<?= base_url() ?>help" class="blorange">Help</a></li>
                <?php
            }
            ?>
            <li><a href="<?= base_url() ?>auth/logout">Logout</a></li>
        </ul>
        <a class="close">
            <span class="ico-remove"></span>
        </a>
    </div>-->
        <div class="widget">
            <div class="datepicker"></div>
        </div>

</div>