<?php
/*
 * Project Name: notary
 * File Name: pasca_realisasi_detail_monitoring
 * Created on: 15 Jan 14 - 13:16:26
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <!--	<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
        
        
    <link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">-->

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

                <!-- header menu start here -->
                <?= $this->load->view('slice/header-menu'); ?>

                <!-- content start here -->
                <div class="content">

                    <div class="page-header">
                        <div class="icon">
                            <span class="ico-pencil"></span>
                        </div>
                        <h1>Proses<small> Pra Realisasi(Proses Akta)</small></h1>
                    </div>
                    <ul class="nav nav-tabs">
                       <!-----------------------------------------------------------
                                        DAFTAR TRANSAKSI CUSTOMER 
                                        ----------------------------------------------------------->
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 17));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li class="active"><a href="<?= base_url() ?>proses/pra_realisasi/entry">Daftar Transaksi Customer</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Transaksi Baru
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 18));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/entry/newTrans">Transaksi Baru</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Input Semua
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 19));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/input_all/transaksi">Input semua</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Input Data
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 56));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/input_data">Input Data</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Validasi Dokumen
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 20));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/validasi">Validasi Dokumen</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Monitoring Dokumen
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 21));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/monitoring_dokumen">Monitoring Dokumen</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Drop Pra-Realisasi
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 22));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/drop">Drop Pra-Realisasi</a></li>
                                            <?php
                                        }
                                        ?>
                    </ul> 
                    <div class="row-fluid">
                        <div class="span6">                

                            <div class="block">
                                <div class="head">                                
                                    <h2>Detail</h2>                                
                                </div>                                        
                                <div class="data-fluid">
                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="30%">
                                                    No
                                                </th>
                                                <th width="40%">
                                                    Akta
                                                </th>


                                                <th width="30%" class="TAC">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $akta = $this->m_aktatran->getDataByTranID($transaksipra->TRANSAKSIPRAID);
                                            foreach ($akta as $at) {
                                                ?>
                                                <tr>

                                                    <td>
                                                        <?php echo $no; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $akt = $this->m_akta->getDataById($at->AKTAID);
                                                        echo $akt->AKTADESC;
                                                        ?>
                                                    </td>


                                                    <td>
                                                        <a href="#dModal" role="button" onClick="display_data('<?php echo $at->AKTAID; ?>', '<?php echo $at->AKTATRANID; ?>', '<?php echo $transaksipra->TRANSAKSIPRAID; ?>')" class="button green tip" data-original-title="Edit" data-toggle="modal"><div class="icon">
                                                                <span class="ico-pencil"></span></div></a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $no++;
                                            };
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="toolbar bottom tar">
                                    <div class="btn-group">
                                        <a href="<?= base_url() ?>proses/pra_realisasi/input_all/sertifikat/<?= $this->uri->segment(5) ?>"><button class="btn">Next</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootrstrap modal form -->

        <div id="dModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


            <div id="data_c">



            </div>


        </div>
    </body>
    <script>

        function display_data(aktaid, aktatranid, tranpraid) {
            xmlhttp4 = GetXmlHttpObject4();
            if (xmlhttp4 == null)
            {
                alert("Your browser does not support AJAX!");
                return;
            }
            var url = "<?php echo base_url(); ?>proses/AktaGetAjax2";
            url = url + "/" + aktaid + "/" + aktatranid + "/" + tranpraid;
            xmlhttp4.onreadystatechange = function()
            {
                if (xmlhttp4.readyState == 4 || xmlhttp4.readyState == "complete")
                {
                    document.getElementById('data_c').innerHTML = xmlhttp4.responseText;
                }
            }
            xmlhttp4.open("POST", url, true);
            xmlhttp4.send(null);
        }

        function GetXmlHttpObject4() {
            var xmlhttp4 = null;
            try {
                // Firefox, Opera 8.0+, Safari
                xmlhttp4 = new XMLHttpRequest();
            }
            catch (e) {
                // Internet Explorer
                try {
                    xmlhttp4 = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch (e) {
                    xmlhttp4 = new ActiveXObject("Microsoft.XMLHTTP");
                }
            }
            return xmlhttp4;
        }


    </script>


</html>