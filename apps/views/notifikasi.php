<?php
/*
 * Project Name: notary
 * File Name: dashboard
 * Created on: 07 Jan 14-8:00:59
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">

    <? //= $this->load->view('slice/header-content'); ?>

    <!-- jquery untuk handle table -->


      <!-- <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/multiselect/jquery.multi-select.min.js'></script>-->


    <!-- header tag start here -->
    <?= $this->load->view('slice/header-dashboard'); ?>
    <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>
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
                        <h1>Dashboard <small>Notifikasi</small></h1>
                    </div>

                    <div class="row-fluid">

                        <div class="span7">

                            <div class="block">
                                <div class="head orange">                                
                                    <h2>Notifikasi</h2>
                                    <ul class="buttons">
                                        <li><a href="#" onClick="source('table_main');
                                                return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>
                                </div>
                                <div class="data-fluid">

                                    <table cellpadding="0" cellspacing="0" width="100%" class="table fpTable lcnp">
                                        <thead>
                                            <tr>                   

                                                <th width="20%">No. Transaksi</th>
                                                <th width="35%">Akta</th>
                                                <th width="30%">Proses</th>                       
                                                <th width="15%">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($aktatran as $attran) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $attran->TRANSAKSIPRAID; ?></td>
                                                    <td><?php echo $this->model_translate->dynamicTranslate('akta', 'AKTAID', $attran->AKTAID, 'AKTADESC'); ?></td>
                                                    <td>
                                                        <?php
                                                        if ($attran->CURRENTPROSES == 0) {
                                                            echo "-";
                                                        } else {
                                                            $proses = $this->model_translate->dynamicTranslate('prosestran', 'PROSESTRANID', $attran->CURRENTPROSES, 'PROSESID');
                                                            echo $this->model_translate->dynamicTranslate('proses', 'PROSESID', $proses, 'PROSESDESC');
                                                        }
                                                        ?>
                                                    </td>                      
                                                    <td>
                                                        <?php
                                                        if ($attran->CURRENTPROSES == 0) {
                                                            echo "-";
                                                        } else {
                                                            $prosestran = $this->m_prosestran->getDataById($attran->CURRENTPROSES);
                                                            $progres = $this->model_translate->dynamicTranslate('statusproses', 'STATUSPROSESID', $prosestran->STATUSPROSES, 'STATUSDESC');
                                                        ?>
                                                        <a class="label label-warning"><?php echo $progres; }?> </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>                            
                            </div>                        

                        </div>
                        <div class="span5">
                            <div class="block">
                                <div class="head">
                                    <div class="icon"><span class="ico-tag"></span></div>
                                    <h2>										Notification</h2>
                                    <ul class="buttons">             
                                        <li><a href="#" onClick="source('tickets');
                                                return false;"><div class="icon"><span class="ico-info"></span></div></a></
                                    </ul>                                
                                </div>
                                <div class="data-fluid">
                                    <table width="100%" class="table tickets">
                                        <?php
                                        if ($notifikasi == NULL) {
                                            echo '<span class="label label-warning">Tidak ada Notifikasi untuk anda</span>';
                                        } else {

                                            foreach ($notifikasi as $row) {
                                                ?>
                                                <tr>
                                                    <?php
                                                    if ($row->TIPE == 0) {
                                                        echo '<td width="55" class="bl_blue"><span class="label label-info">APPROVAL</span></td>';
                                                    } elseif ($row->TIPE == 1) {
                                                        echo '<td width="55" class="bl_green"><span class="label label-success">ACCEPTED</span></td>';
                                                    } elseif ($row->TIPE == 2) {
                                                        echo '<td width="55" class="bl_red"><span class="label label-important">ALERTED</span></td>';
                                                    }
                                                    $time = $row->TIMESTAMP;
                                                    $now = date('d-m-Y', strtotime($time));
                                                    if ($row->TIPE == 0) {

                                                        echo '<td width="50">#APROVAL<span class="mark">' . $now . '</span></td>';
                                                        echo '<td><a href="' . base_url() . 'notifikasi/redirect/' . $row->NOTIFIKASIID . '" class="cblue">' . $row->MESSAGE1 . '</a> <span class="mark">' . $row->MESSAGE2 . '</td>';
                                                    } else if ($row->TIPE == 1) {

                                                        echo '<td width="50">#ACCEPTED<span class="mark">' . $now . '</span></td>';
                                                        echo '<td><a href="' . base_url() . 'notifikasi/redirect/' . $row->NOTIFIKASIID . '" class="cgreen">' . $row->MESSAGE1 . '</a> <span class="mark">' . $row->MESSAGE2 . '</td>';
                                                    } else if ($row->TIPE == 2) {

                                                        echo '<td width="50">#ALERTED<span class="mark">' . $now . '</span></td>';
                                                        echo '<td><a href="' . base_url() . 'notifikasi/redirect/' . $row->NOTIFIKASIID . '" class="cred">' . $row->MESSAGE1 . '</a> <span class="mark">' . $row->MESSAGE2 . '</td>';
                                                    }
                                                    ?>                                 
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?> 
                                    </table>
                                </div>                                   
                            </div>                        
                        </div>
                    </div>
                    <?= $this->load->view('slice/tambal'); ?>
                    <br>&nbsp;
                    <br>&nbsp;
                    <br>&nbsp;
                    <br>&nbsp;
                    <br>&nbsp;
                    <br>&nbsp;
                    <br>&nbsp;
                    <br>&nbsp;
                    <br>&nbsp;
                    <br>&nbsp;
                    <br>&nbsp;
                    <br>&nbsp;
                    <br>&nbsp;
                    <br>&nbsp;
                    <br>&nbsp;

                </div>
                <!-- content ends here -->
            </div>
        </div>
    </body>
</html>

