<?php
/*
 * Project Name: notary
 * File Name: pasca_realisasi
 * Created on: 15 Jan 14 - 12:55:32
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
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/multiselect/jquery.multi-select.min.js'></script>
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
                        <div align="center"><strong>[Pemberitahuan]</strong> Data berhasil disimpan!</div>
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
                            <a href="<?= base_url() ?>proses/pra_realisasi/input_all/transaksi"><span class="ico-arrow-left"></span></a>
                        </div>
                        <h1>Kembali <small> Kembali ke input data pra-realisasi</small></h1>
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

                                <ul class="nav nav-tabs">
                                    <!-----------------------------------------------------------
                                    MONITORING
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 26));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li class="active"><a href="<?= base_url() ?>proses/pasca_realisasi" >Monitoring</a></li>
                                        <?php
                                    }
                                    ?>
                                    <!-----------------------------------------------------------
                                    EKSKALASI
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 27));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>proses/pasca_realisasi/ekskalasi" >Ekskalasi</a></li>
                                        <?php
                                    }
                                    ?>
                                    <!-----------------------------------------------------------
                                    APPROVAL
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 28));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>proses/pasca_realisasi/approval" >Approval</a></li>
                                        <?php
                                    }
                                    ?>
                                    <!-----------------------------------------------------------
                                    UPDATE PROSES
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 29));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>proses/pasca_realisasi/update_proses">Update Proses</a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="block">
                                <form method="POST" action="<?= base_url(); ?>control/edit/monitoring_filter">
                                    <div class="data-fluid">
                                        <div class="row-form">
                                            <div class="span2">Dari Tanggal:</div>
                                            <div class="span3">                                                            
                                                <input type="text" value="" name="tgldari" id="dp1" />
                                            </div>
                                            <div class="span2">Sampai Tanggal:</div>
                                            <div class="span3">                                                            
                                                <input type="text" value="" name="tglke" id="dp" />
                                            </div>
                                            <div class="span2"><button class="btn" type="submit">Cari</button></div>
                                            <div class="span3">    
                                            </div>  
                                        </div>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span12">
                            <div class="block">
                                <div class="data-fluid">
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 26));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 == 1) {
                                        ?>
                                        <H3>Anda tidak punya hak akses untuk menu Monitoring</H3>
                                        <H4>Silahkan pilih tab menu yang tersedia diatas</H4>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="pqr">
                                            <table class="table fTable lcnp dataTable" cellpadding="0" cellspacing="0">
                                                <tr>
                                                        <th>TransaksipraID</th>
                                                        <th>No. Covernote</th>
                                                        <th>Tgl. Akad</th>
                                                        <th>Deadline Covernote</th>
                                                        <th>Nama Debitur</th>
                                                        <th>Nama Badan</th>
                                                        <th>Developer</th>
                                                        <th>Kota/Kab Notaris</th>
                                                        <th>Kelurahan/Desa</th>
                                                        <th>Bank</th>
                                                        <th>Pembuat Akta</th>
                                                        <th>Nomer Akta</th>
                                                        <th>Jenis Akta</th>
                                                        <th>Notaris Akta</th>
                                                        <th>Proses</th>
                                                        <th>PJ Proses</th>
                                                        <th>Kantor Proses</th>
                                                        <th>Status Proses</th>
                                                        <th>Tgl. Masuk</th>
                                                        <th>Tgl. Deadline</th>
                                                        <th>Tgl. Selesai</th>
                                                        <th>Tgl. Penyerahan</th>
                                                        <th>Tipe Sertifikat</th>
                                                        <th>Nomor Sertifikat</th>
                                                        <th>Nama Pemilik Sertifikat</th>
                                                        <th>Nama Penjual Sertifikat</th>
                                                        <th>Nama Pembeli</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-bordered">
                                                    <?php foreach ($monitoring as $row) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $row->TRANSAKSIPRAID ?></td>
                                                            <td><?= $row->NOCOVERNOTE ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row->TGLAKAD != 0000 - 00 - 00) {
                                                                    echo date('d-m-Y', strtotime($row->TGLAKAD));
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($row->TGLSELESAI_COVERNOTE != 0000 - 00 - 00) {
                                                                    echo date('d-m-Y', strtotime($row->TGLSELESAI_COVERNOTE));
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?= $this->model_translate->dynamicTranslate('customer', 'CUSTOMERID', $row->CUSTOMERID, 'NAMACUST') ?></td>
                                                            <td><?= $this->model_translate->dynamicTranslate('contactditailcustomer', 'CUSTOMERID', $row->CUSTOMERID, 'NAMAPERUSAHAAN') ?></td>
                                                            <td><?php
                                                                if ($row->DEVELOPERID == NULL) {
                                                                    echo '';
                                                                } else {
                                                                    echo $this->model_translate->dynamicTranslate('developer', 'DEVELOPERID', $row->DEVELOPERID, 'DEVELOPERDESC');
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?= $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'KOTA_KAB'); ?></td>
                                                            <td><?= $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'KEL_DESA'); ?></td>
                                                            <td><?= $this->model_translate->dynamicTranslate('bankrekening', 'BANKREKID', $row->BANKREKID, 'BANKREKDESC'); ?></td>
                                                            <td><?= $this->model_translate->dynamicTranslate('employee', 'EMPLOYEEID', $row->EMPLOYEEID, 'NAMALENGKAP'); ?></td>
                                                            <td><?= $row->NOAKTA; ?></td>
                                                            <td><?= $this->model_translate->dynamicTranslate('akta', 'AKTAID', $row->AKTAID, 'AKTADESC'); ?></td>
                                                            <td><?= $row->NOTARISAKTA; ?></td>
                                                            <td><?= $this->model_translate->dynamicTranslate('proses', 'PROSESID', $row->PROSESID, 'PROSESDESC'); ?></td>
                                                            <td><?= $this->model_translate->dynamicTranslate('employee', 'EMPLOYEEID', $row->PJPROSES, 'NAMALENGKAP'); ?></td>
                                                            <td><?php
                                                                $kantor = $this->model_translate->dynamicTranslate('proses', 'PROSESID', $row->PROSESID, 'KANTORPROSESID');
                                                                echo $this->model_translate->dynamicTranslate('kantorproses', 'KANTORPROSESID', $kantor, 'KANTORPROSES');
                                                                ?>
                                                            </td>
                                                            <td><?php
                                                                if ($row->STATUSPROSES == '1') {
                                                                    echo '<span class="label label-warning">' . $this->model_translate->dynamicTranslate('statusproses', 'STATUSPROSESID', $row->STATUSPROSES, 'STATUSDESC') . '</span>';
                                                                } else if ($row->STATUSPROSES == '2') {
                                                                    echo '<span class="label label-success">' . $this->model_translate->dynamicTranslate('statusproses', 'STATUSPROSESID', $row->STATUSPROSES, 'STATUSDESC') . '</span>';
                                                                } else if ($row->STATUSPROSES == '3') {
                                                                    echo '<span class="label label-important">' . $this->model_translate->dynamicTranslate('statusproses', 'STATUSPROSESID', $row->STATUSPROSES, 'STATUSDESC') . '</span>';
                                                                } else {
                                                                    echo '<span class="label label-important">' . $this->model_translate->dynamicTranslate('statusproses', 'STATUSPROSESID', $row->STATUSPROSES, 'STATUSDESC') . '</span>';
                                                                }
                                                                ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row->TGLMASUK != 0000 - 00 - 00) {
                                                                    echo date('d-m-Y', strtotime($row->TGLMASUK));
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td> 
                                                                <?php
                                                                if ($row->TGLDEADLINE != 0000 - 00 - 00) {
                                                                    echo date('d-m-Y', strtotime($row->TGLDEADLINE));
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($row->TGLSELESAI != 0000 - 00 - 00) {
                                                                    echo date('d-m-Y', strtotime($row->TGLSELESAI));
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($row->TGLPENYERAHAN != 0000 - 00 - 00) {
                                                                    echo date('d-m-Y', strtotime($row->TGLPENYERAHAN));
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php
                                                                $tipeSertifikat = $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'TYPESERTIFIKATID');
                                                                echo $this->model_translate->dynamicTranslate('typesertifikat', 'TYPESERTIFIKATID', $tipeSertifikat, 'TYPESERTIFIKATDESC'); ?></td>
                                                            <td><?= $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'NOMOR'); ?></td>
                                                            <td><?= $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'NAMAPEMILIK'); ?></td>
                                                            <td><?= $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'NAMAPENJUAL'); ?></td>
                                                            <td><?= $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'NAMAPEMBELI'); ?></td>
                                                        </tr>
                                                        <?php
                                                    }
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
            </div>
            <?= $this->load->view('slice/tambal'); ?>
        </div>
    </body>
     <script>
        /*if (top.location != location) {
         top.location.href = document.location.href ;
         }*/
        $(function() {
            window.prettyPrint && prettyPrint();
            $('#dp1').datepicker({
                format: 'dd-mm-yyyy'
            });
            $('#dp2').datepicker({format: 'dd-mm-yyyy'});

            var checkin = $('#dpd1').datepicker({
                onRender: function(date) {
                    return date.valueOf() < now.valueOf() ? 'disabled' : '';
                }
            }).on('changeDate', function(ev) {
                if (ev.date.valueOf() > checkout.date.valueOf()) {
                    var newDate = new Date(ev.date)
                    newDate.setDate(newDate.getDate() + 1);
                    checkout.setValue(newDate);
                }
                checkin.hide();
                $('#dpd2')[0].focus();
            }).data('datepicker');
            var checkout = $('#dpd2').datepicker({
                onRender: function(date) {
                    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
                }
            }).on('changeDate', function(ev) {
                checkout.hide();
            }).data('datepicker');
        });
        
        $(function() {
            window.prettyPrint && prettyPrint();
            $('#dp').datepicker({
                format: 'dd-mm-yyyy'
            });
            $('#dp2').datepicker({format: 'dd-mm-yyyy'});

            var checkin = $('#dpd').datepicker({
                onRender: function(date) {
                    return date.valueOf() < now.valueOf() ? 'disabled' : '';
                }
            }).on('changeDate', function(ev) {
                if (ev.date.valueOf() > checkout.date.valueOf()) {
                    var newDate = new Date(ev.date)
                    newDate.setDate(newDate.getDate() + 1);
                    checkout.setValue(newDate);
                }
                checkin.hide();
                $('#dpd2')[0].focus();
            }).data('datepicker');
            var checkout = $('#dpd2').datepicker({
                onRender: function(date) {
                    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
                }
            }).on('changeDate', function(ev) {
                checkout.hide();
            }).data('datepicker');
        });
    </script>
</html>
